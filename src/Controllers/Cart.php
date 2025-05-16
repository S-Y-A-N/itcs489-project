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
      $data = json_decode($input, true);

      switch ($data['action']) {
        case 'remove':
          $this->remove_item($data);
          break;
        case 'update':
          $this->update_quantity($data);
          break;
        default:
          $this->index();
      }

    } else {
      $this->index();
    }
  }

  private function index()
  {
    $cart = (new \Models\Cart)->get();

    $this->view_user_page($this->view, [
      'cart_items' => $cart['cart_items'],
      'total_quantity' => $cart['total_quantity'],
      'total_price' => $cart['total_price']
    ]);
  }

  public function update_quantity($data)
  {
    (new \Models\Cart())->updateQuantity($data);
  }

  public function remove_item($data)
  {
    (new \Models\Cart())->removeItem($data);
  }


}

$controller = new Cart();