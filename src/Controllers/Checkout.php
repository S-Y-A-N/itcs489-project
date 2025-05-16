<?php

namespace Controllers;

class Checkout extends \Core\Controller
{
  private $view = 'checkout';

  public function __construct()
  {
    if (!isset($_SESSION['user_id'])) {
      header('Location: /login');
      exit();
    }

    $this->index();
  }

  public function index()
  {
    $cart = (new \Models\Cart())->get();
    $addresses = (new \Models\Address())->getAddresses($_SESSION['user_id']);
    $cards = (new \Models\BankCard())->getCards($_SESSION['user_id']);

    if (empty($cart['cart_items'])) {
      header('Location: /cart');
      exit();
    }

    $taxRate = 0.1;
    $deliveryCost = number_format(2, 2);
    $subtotal = $cart['total_price'];
    $totalPrice = $subtotal + $subtotal * $taxRate + $deliveryCost;

    $this->view_page($this->view, [
      'cart_items' => $cart['cart_items'],
      'subtotal' => $subtotal,
      'tax_rate' => $taxRate,
      'delivery_cost' => $deliveryCost,
      'total_price' => $totalPrice,
      'total_quantity' => $cart['total_quantity'],
      'addresses' => $addresses,
      'cards' => $cards,
    ]);
  }

}

new Checkout();