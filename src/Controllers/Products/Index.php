<?php

namespace Controllers;

class Show extends \Core\Controller
{
  private $view = 'products/index';
  private $errors = [];


  public function __construct()
  {
    $searchTerm = $_GET['search'] ?? null;

    $searchTerm = trim($searchTerm);

    // Fetch filtered products
    $products = (new \Models\Product())->searchProducts($searchTerm);

    // Pass products and search term to the view
    $this->view_page(view: $this->view, data: [
      'products' => $products,
      'title' => $searchTerm,
    ]);
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