<?php

namespace Controllers;

class ProductShow extends \Core\Controller
{
  private $view = 'products/show';
  private $errors = [];


  public function __construct()
  {
    $input = file_get_contents('php://input');
    $content_type = $_SERVER['CONTENT_TYPE'] ?? '';

    if (str_contains($content_type, 'application/json') && !empty($input)) {
      $data = json_decode($input, true);

      if (isset($data['cart'])) {
        $this->add_to_cart($data);

      } else if (isset($data['wishlist'])) {
        $this->add_to_wishlist($data);

      }


    } else {
      $this->index();
    }
  }

  private function index()
  {
    if (isset($_GET['id'])) {
      $product_id = (int) $_GET['id'];

      $product_model = new \Models\Product();
      $product = $product_model->get_id($product_id);

      $this->view_user_page($this->view, [
        'product' => $product,
        'errors' => $this->errors
      ]);
    } else {
      header('Location: /');
    }
  }


  public function add_to_cart($data)
  {
    (new \Models\Cart)->add($data);
  }


  public function add_to_wishlist($data)
  {
    if (isset($_SESSION['user_id'])) {
      (new \Models\Wishlist())->add($_SESSION['user_id'], $data['product_id']);
    } else {
      echo json_encode(['success' => false, 'message' => 'Please login to add items to your wishlist.']);
      return false;
    }
  }

}

$controller = new ProductShow();