<?php

namespace Controllers;

class PaymentSuccess extends \Core\Controller
{
  private $view = 'payment-success';

  public function __construct()
  {
    if (empty($_SESSION['access_payment_success'])) {
      header('Location: /');
      exit;
    }

    unset($_SESSION['access_payment_success']);

    $paymentId = $_GET['paymentId'];
    $orderId = $_GET['orderId'];

    $this->view_page($this->view, [
      'paymentId' => $paymentId,
      'orderId' => $orderId,
    ]);
  }
}



new PaymentSuccess();