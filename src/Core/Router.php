<?php

namespace Core;

class Router
{
  protected $routes = [];

  public function get($uri, $controller)
  {
    $this->routes[] = [
      'uri' => $uri,
      'controller' => $controller,
      'method' => 'GET',
    ];
  }

  // Create New Record
  public function post($uri, $controller)
  {
    $this->routes[] = [
      'uri' => $uri,
      'controller' => $controller,
      'method' => 'POST',
    ];
  }

  public function delete($uri, $controller)
  {
    $this->routes[] = [
      'uri' => $uri,
      'controller' => $controller,
      'method' => 'DELETE',
    ];
  }

  // Partial Update of Record
  public function patch($uri, $controller)
  {
    $this->routes[] = [
      'uri' => $uri,
      'controller' => $controller,
      'method' => 'PATCH',
    ];
  }

  // Complete Update (Replacement) of Record
  public function put($uri, $controller)
  {
    $this->routes[] = [
      'uri' => $uri,
      'controller' => $controller,
      'method' => 'PUT',
    ];
  }

  public function route($uri, $method)
  {
    // loop over routes to require the correct controller file
    foreach ($this->routes as $route) {
      if ($route['uri'] === $uri && $route['method'] === strtoupper($method)) {
        require source_path("Controllers/{$route['controller']}.php");
        return true;
      }
    }

    abort();
    return false;
  }
}
