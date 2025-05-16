<?php

namespace Controllers;

class ProductIndex extends \Core\Controller
{
  private $view = 'products/index';

  public function __construct()
  {
    $productModel = new \Models\Product();
    if (isset($_GET['search'])) {
      $searchTerm = $_GET['search'] ?? " ";
      $searchTerm = trim($searchTerm);
      $products = $productModel->searchProducts($searchTerm);
      $title = "Results for '$searchTerm'";
    } else if ($_SERVER['REQUEST_URI'] == '/electronics') {
      $products = $productModel->getProductsByCategory('electronics');
      $title = 'Electronics';
    } else if ($_SERVER['REQUEST_URI'] == '/women') {
      $products = $productModel->getProductsByCategory('women');
      $title = 'Women Fashion';
    } else if ($_SERVER['REQUEST_URI'] == '/men') {
      $products = $productModel->getProductsByCategory('men');
      $title = 'Men Fashion';
    } else if ($_SERVER['REQUEST_URI'] == '/babies') {
      $products = $productModel->searchProducts('babies');
      $title = 'Babies and Infants';
    } else if ($_SERVER['REQUEST_URI'] == '/girls') {
      $products = $productModel->searchProducts('girls');
      $title = 'Girls Fashion';
    } else if ($_SERVER['REQUEST_URI'] == '/boys') {
      $products = $productModel->searchProducts('boys');
      $title = 'Boys Fashion';
    } else if ($_SERVER['REQUEST_URI'] == '/furniture') {
      $products = $productModel->searchProducts('furniture');
      $title = 'Home and Furniture';
    } else {
      $products = $productModel->get_all();
      $title = 'Products';
    }


    // Pass products and search term to the view
    $this->view_page(view: $this->view, data: [
      'products' => $products,
      'title' => $title,
    ]);
  }

}

$controller = new ProductIndex();