<?php

namespace Controllers;

class Show extends \Core\Controller
{
  private $view = 'products/show';
  private $errors = [];


  public function __construct()
  {
    $input = file_get_contents('php://input');
    $content_type = $_SERVER['CONTENT_TYPE'] ?? '';

    if (str_contains($content_type, 'application/json') && !empty($input)) {
      $data = json_decode($input, true);
      $this->add_to_cart($data);
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

      $this->view_page($this->view, [
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









  public function add_to_wishlist()
  {

  }

}

$controller = new Show();