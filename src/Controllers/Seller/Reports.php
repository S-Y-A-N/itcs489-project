<?php

namespace Controllers;

class Index extends \Core\Controller
{
  private $view = 'seller/reports';

  public function __construct()
  {
    $this->index();
  }

  private function index()
  {
    $this->view_seller_page($this->view);
  }
}

$controller = new Index();