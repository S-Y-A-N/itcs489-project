<?php

namespace Controllers;

class Cart extends \Core\Controller
{
  private $view = 'cart';

  public function __construct()
  {
    $input = file_get_contents('php://input');
    $content_type = $_SERVER['CONTENT_TYPE'] ?? '';

    if (str_contains($content_type, 'application/json') && !empty($input)) {
      $this->update_quantity($input);
    } else {
      $this->index();
    }
  }

  private function index()
  {
    $cart = (new \Models\Cart)->get();

    if (empty($cart['cart_items'])) {
      $this->view_page('empty_cart');
      return;
    }

    $this->view_page($this->view, [
      'cart_items' => $cart['cart_items'],
      'total_quantity' => $cart['total_quantity'],
      'total_price' => $cart['total_price']
    ]);
  }

  public function update_quantity($input)
  {
    $data = json_decode($input, true);
    (new \Models\Cart())->updateQuantity($data);
  }


}

$controller = new Cart();