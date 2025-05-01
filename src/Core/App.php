<?php

namespace Core;

class App
{
  private $router;

  public function __construct()
  {
    $this->router = new \Core\Router();
    $this->load_routes($this->router);
    $this->handle_middlewares();
    $this->load_controller();
  }

  private function load_routes($router) {
    require 'routes.php' ;
  }

  private function handle_middlewares() {
    $url = $this->get_url();

    // If user is logged in go to home
    if ( isset($_SESSION['email']) && ($url === '/login' || $url === '/register')) {
      header("Location: /");
      exit;
    }
  }

  private function load_controller()
  {
    $url = $this->get_url();
    $method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];
    $this->router->route($url, $method);
  }

  private function get_url() {
    return parse_url($_SERVER['REQUEST_URI'])['path'] ?? '/';
  }
}
