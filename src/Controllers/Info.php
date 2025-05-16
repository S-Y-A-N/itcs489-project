<?php

namespace Controllers;

class Info extends \Core\Controller
{
  private $view;

  public function __construct()
  {
    $productModel = new \Models\Product();
    if ($_SERVER['REQUEST_URI'] == '/about') {
      $this->view = 'info/about';

    } else if ($_SERVER['REQUEST_URI'] == '/faq') {
      $this->view = 'info/faq';

    } else if ($_SERVER['REQUEST_URI'] == '/terms-and-conditions') {
      $this->view = 'info/terms-and-conditions';

    } else if ($_SERVER['REQUEST_URI'] == '/privacy-policy') {
      $this->view = 'info/privacy-policy';

    } else if ($_SERVER['REQUEST_URI'] == '/team') {
      $this->view = 'info/team';

    } else if ($_SERVER['REQUEST_URI'] == '/return-policy') {
      $this->view = 'info/return-policy';

    } else {
      header('Location: /');
    }

    $this->view_user_page(view: $this->view);
  }

}

$controller = new Info();