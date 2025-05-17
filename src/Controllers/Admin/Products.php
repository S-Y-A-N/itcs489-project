<?php

namespace Controllers;

class Products extends \Core\Controller
{
  private $view = 'admin/products-admin';

  public function __construct()
  {
    if (!isset($_SESSION['admin_id'])) {
      header('Location: /');
      exit;
    }


    $this->index();
  }

  private function index()
  {

    $this->view_admin_page($this->view, [

    ]);
  }
}

$controller = new Products();