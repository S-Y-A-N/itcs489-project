<?php

namespace Controllers;

class Home extends \Core\Controller
{
  private $view = 'home';

  public function __construct() {
    $this->index();
  }

  private function index() {
    $product_model = new \Models\Product();
    $seller_model = new \Models\Seller();
    $products = $product_model->get_all();

    foreach ($products as &$p) {
      $seller = $seller_model->get_seller($p['seller_id']);
      $p['new_price'] = $p['price'] - $p['price']*$p['offer'];
      $p['brand_name'] = $seller['brand_name'];
    }

    $this->view_page($this->view, [
      'h1' => 'Online Shopping',
      'products' => $products
    ]);
  }



}

$controller = new Home();