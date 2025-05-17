<?php

namespace Controllers;

class Authorization extends \Core\Controller
{
  private $view = 'admin/authorization-admin';

  public function __construct()
  {
    if (!isset($_SESSION['admin_id'])) {
      header('Location: /');
      exit;
    }


    $this->index();
  }

  private function index()
  {

    $this->view_admin_page($this->view, [

    ]);
  }
}

$controller = new Authorization();