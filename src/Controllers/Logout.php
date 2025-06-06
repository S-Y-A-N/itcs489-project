<?php

namespace Controllers;

use Core\Validator;

class Logout extends \Core\Controller
{
  private $view = 'logout';

  public function __construct()
  {
    $this->logout();
    $this->index();

  }

  private function index()
  {
    $this->view_user_page($this->view);
  }

  private function logout()
  {
    $_SESSION = [];
    session_destroy();
  }

}

$controller = new Logout();