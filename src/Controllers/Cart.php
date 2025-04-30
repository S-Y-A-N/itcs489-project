<?php

namespace Controllers;

use Core\Validator;

class Cart extends \Core\Controller
{
  private $view = 'cart';

  public function __construct()
  {
    if (Validator::post('quantity')) {
      $this->update_quantity();
    }
    $this->index();
  }

  private function index()
  {
    $product_model = new \Models\Product();

    $cart_items = isset($_COOKIE['cart']) ? json_decode($_COOKIE['cart'], true) : [];
    $total_quantity = 0;
    $total_price = 0;

    foreach ($cart_items as &$item) {
      $item['info'] = $product_model->get_id($item['product_id']);
      $item['total_price'] = number_format((float) $item['info']['new_price'] * $item['quantity'], 2);
      $total_quantity += (int) $item['quantity'];
      $total_price += (int) $item['info']['new_price'];
    }
    unset($item);

    $this->view_page($this->view, [
      'cart_items' => $cart_items,
      'total_quantity' => $total_quantity,
      'total_price' => $total_price
    ]);
  }

  public function update_quantity()
  {
    // user logged in, save to db
    if (isset($_SESSION['user_id'])) {

    }

    // user not logged in, save in cookie
    else {
      dump($_COOKIE);

      $cart = isset($_COOKIE['cart']) ? json_decode($_COOKIE['cart'], true) : [];
      $quantity = (int) $_POST['quantity'];
      dump($_POST['product_id']);


      // update quantity if product exists in cart
      foreach ($cart as &$item) {
        if ($item['product_id'] == $_POST['product_id']) {
          $item['quantity'] = $quantity;
          dump($item);
        }
      }
      unset($item);

      setcookie('cart', json_encode($cart), time() + (86400 * 7), "/");
    }
  }

}

$controller = new Cart();