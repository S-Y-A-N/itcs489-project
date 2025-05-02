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

    if (empty($cart['cart_items'])) {
      header('Location: /');
      exit();
    }

    $this->view_page($this->view, [
      'cart_items' => $cart['cart_items'],
      'total_price' => $cart['total_price'],
      'total_quantity' => $cart['total_quantity'],
    ]);
  }

}

new Checkout();