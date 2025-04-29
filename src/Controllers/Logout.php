<?php

namespace Controllers;

use Core\Validator;

class Login extends \Core\Controller
{
  private $view = 'logout';

  public function __construct()
  {
    $this->logout();
    $this->index();

  }

  private function index()
  {
    $this->view_page($this->view);
  }

  private function logout()
  {
    $_SESSION = [];
    session_destroy();
  }

}

$controller = new Login();