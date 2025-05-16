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
    $products = $product_model->get_all();

    $this->view_user_page($this->view, [
      'h1' => 'Online Shopping',
      'products' => $products
    ]);
  }



}

$controller = new Home();