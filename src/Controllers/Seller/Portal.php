<?php

namespace Controllers;

use Core\Validator;

class Portal extends \Core\Controller
{
  private $view = 'seller/portal';
  private $errors = [];

  public function __construct()
  {
    if (Validator::post('register')) {
      $this->register();
    } else if (Validator::post('login')) {
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

  private function register()
  {
    $seller = new \Models\Seller();
    $seller->create();
    $this->errors = $seller->errors;
  }

  private function login()
  {
    $model = new \Models\Seller();
    $seller = $model->getSellerWithCredentials($_POST['email'], $_POST['password']);
    $this->errors = $model->errors;
    if ($seller)
      $this->create_session($seller);
  }

  private function create_session($seller)
  {
    $_SESSION['seller_id'] = $seller['seller_id'];
    $_SESSION['brand_name'] = $seller['brand_name'];
    $_SESSION['email'] = $seller['email'];
    header('Location: /seller/dashboard');
  }
}

$controller = new Portal();