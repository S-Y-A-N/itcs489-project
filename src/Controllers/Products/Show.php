<?php

namespace Controllers;

use Core\Validator;

class Show extends \Core\Controller
{
  private $view = 'products/show';
  private $errors = [];

  public function __construct()
  {
    if (Validator::post('cart')) {
      dump($_POST);
      $this->add_to_cart();
    } else if (Validator::post('wishlist')) {
      dump($_POST);
      $this->add_to_wishlist();
    }

    $this->index();
  }

  private function index()
  {
    if (isset($_GET['id'])) {
      $product_id = (int) $_GET['id'];

      $product_model = new \Models\Product();
      $product = $product_model->get_id($product_id);

      $this->view_page($this->view, [
        'product' => $product,
        'errors' => $this->errors
      ]);
    } else {
      header('Location: /');
    }
  }

  public function add_to_cart()
  {
    // user logged in, save to db
    if (isset($_SESSION['user_id'])) {

    }

    // user not logged in, save in cookie
    else {
      dump($_COOKIE);

      $cart = isset($_COOKIE['cart']) ? json_decode($_COOKIE['cart'], true) : [];
      $quantity = (int) $_POST['quantity'];
      $found = false;
      // update quantity if product exists in cart
      foreach ($cart as &$item) {
        if ($item['product_id'] == $_POST['product_id']) {
          if ($item['quantity'] < 5) {
            $item['quantity'] += $quantity;
          } else {
            $this->errors['max'] = 'Cannot add more than 5 of this item to cart';
          }
          $found = true;
          break;
        }
      }
      unset($item);

      // If not found, add new item
      if (!$found) {
        $cart[] = [
          'product_id' => $_POST['product_id'],
          'quantity' => (int) $_POST['quantity']
        ];
      }

      setcookie('cart', json_encode($cart), time() + (86400 * 7), "/");
      $this->errors['success'] = "Item added to cart successfully (Quantity: $quantity)";
    }
  }

  public function add_to_wishlist()
  {

  }

}

$controller = new Show();