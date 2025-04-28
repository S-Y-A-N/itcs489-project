<?php

namespace Controllers;

use Core\Validator;

class Login extends \Core\Controller
{
  private $view = 'login';
  private $errors = [];

  public function __construct()
  {

    if (Validator::post('login')) {
      $this->login();
    }
      $this->index();
    
  }

  private function index()
  {
    $this->view_page($this->view, [
      'errors' => $this->errors
    ]);
  }

  private function login() {
    // login via User model, authentication important!
  }

}

// Don't load this page at all if user is logged in!
if (isset($_SESSION['email'])) {
  header('Location: /');
  exit;
}

$controller = new Login();