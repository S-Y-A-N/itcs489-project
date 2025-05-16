<?php

namespace Controllers;

use Core\Validator;

class Contact extends \Core\Controller
{
  private $view = 'contact';

  public function __construct()
  {
    if (Validator::post('contact')) {
      // send contact info to admin...
    }

    $this->index();
  }

  private function index()
  {
    $this->view_page($this->view);
  }
}

$controller = new Contact();