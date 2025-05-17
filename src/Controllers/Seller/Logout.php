<?php

namespace Controllers;

class Logout extends \Core\Controller
{
  private $view = 'seller/portal';

  public function __construct()
  {
    $this->logout();
    $this->index();

  }

  private function index()
  {
    render($this->view);
  }

  private function logout()
  {
    $_SESSION = [];
    session_destroy();
  }

}

$controller = new Logout();