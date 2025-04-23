<?php

namespace Controllers;

class Home extends \Core\Controller
{
  private $view = 'home';

  public function __construct() {
    $this->index();
  }

  private function index() {
    $this->view_page($this->view, [
      'h1' => 'Online Shopping',
    ]);
  }



}

$home = new Home();