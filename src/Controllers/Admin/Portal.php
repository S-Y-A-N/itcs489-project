<?php

namespace Controllers;

use Core\Validator;

class Portal extends \Core\Controller
{
  private $view = 'admin/portal';
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
    render($this->view, [
      'errors' => $this->errors,
    ]);
  }

  private function login()
  {
    $model = new \Models\Admin();
    $admin = $model->getAdminWithCredentials($_POST['email'], $_POST['password']);
    $this->errors = $model->errors;
    if ($admin)
      $this->create_session($admin);
  }

  private function create_session($admin)
  {
    $_SESSION['admin_id'] = $admin['admin_id'];
    $_SESSION['email'] = $admin['email'];
    header('Location: /admin/dashboard');
  }
}

$controller = new Portal();