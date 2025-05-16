<?php

namespace Controllers;

class Portal extends \Core\Controller
{
  private $view = 'seller/portal';

  public function __construct()
  {
    $this->index();
  }

  private function index()
  {
    $this->view_seller_page($this->view);
  }
}

$controller = new Portal();