<?php

namespace Controllers;

class Index extends \Core\Controller
{
  private $view = 'seller/customers';

  public function __construct()
  {
    if (!isset($_SESSION['seller_id'])) {
      header('Location: /');
      exit;
    }

    $this->index();
  }

  private function index()
  {
    $this->view_seller_page($this->view);
  }
}

$controller = new Index();