<?php

namespace Controllers;

use Core\Validator;

class Register extends \Core\Controller
{
  private $view = 'register';
  private $errors = [];

  public function __construct()
  {

    if (Validator::post('register')) {
      $this->register();
    }
      $this->index();
    
  }

  private function index()
  {
    $this->view_user_page($this->view, [
      'errors' => $this->errors
    ]);
  }

  private function register() {
    $user = new \Models\User();
    $user->create();
    $this->errors = $user->errors;
    $this->index();
  }

}

// Don't load this page at all if user is logged in!
if (isset($_SESSION['email'])) {
  header('Location: /');
  exit;
}

$controller = new Register();