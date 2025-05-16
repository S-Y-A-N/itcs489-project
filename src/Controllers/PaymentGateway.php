<?php

namespace Controllers;

use Core\Validator;

class PaymentGateway extends \Core\Controller
{
  private $view = 'payment-gateway';

  public function __construct()
  {
    if (Validator::post('pay')) {
      $userId = $_SESSION['user_id'];
      $data = $_POST;
      $result = $this->processPayment($userId, $data);

      if ($result) {
        $_SESSION['access_payment_success'] = true;

        $this->view_user_page($this->view, [
          'paymentId' => $result['paymentId'],
          'orderId' => $result['orderId'],
        ]);
      }
    }
  }

  private function processPayment($userId, $data)
  {
    // returns the created payment is successful, otherwise returns false
    $result = (new \Models\Payment())->processPayment($userId, $data['amount'], $data['paymentMethod']);

    if ($result) {
      $paymentId = $result['payment_id'];
      $orderId = $this->placeOrder($userId, $paymentId, $data['addressId']);

      if ($orderId) {
        return [
          'paymentId' => $paymentId,
          'orderId' => $orderId,
        ];
      }
    }

    return false;
  }

  private function placeOrder($userId, $paymentId, $addressId)
  {
    $orderId = (new \Models\Order())->createOrder($userId, $paymentId, $addressId);

    if ($orderId) {
      return $orderId;
    }

    return false;
  }
}



new PaymentGateway();