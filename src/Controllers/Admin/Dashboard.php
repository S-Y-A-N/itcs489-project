<?php

namespace Controllers;

class Index extends \Core\Controller
{
  private $view = 'admin/dashboard-admin';

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

$controller = new Index();