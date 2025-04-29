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

  private function login()
  {
    $model = new \Models\User();
    $login_type = $_POST['email'] != "" ? 'email' : 'phone';
    $user = $model->get_user_with_credentials($login_type, $_POST[$login_type], $_POST['password']);
    $this->errors = $model->errors;
    if ($user) $this->create_session($user);
    $this->index();
  }

  private function create_session($user) {
    $_SESSION['email'] = $user['email'];
    $_SESSION['phone'] = $user['phone'];
    $_SESSION['persistent'] = isset($_POST['keepLogin']);

    header('Location: /');
  }

}

$controller = new Login();