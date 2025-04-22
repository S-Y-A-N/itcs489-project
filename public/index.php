<?php

/** Required Section */
const SOURCE_PATH = __DIR__ . '/../src/'; // Source path: /src
const PUBLIC_PATH = __DIR__; // Public path: /public

require SOURCE_PATH . 'Core/functions.php';

spl_autoload_register(function ($class) {
  $class = str_replace("\\", DIRECTORY_SEPARATOR, $class);
  require source_path("{$class}.php");
});
/** End of Required Section */

// create router object
$router = new \Core\Router();

$routes = require source_path('routes.php');

// Start Session
session_start();

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
$method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];
// go to controller of the current url, for example: if the url is '/' it goes to 'controllers/index.php'
$router->route($uri, $method);

// go to user home if there is a session
if ( isset($_SESSION['email']) && $uri === '/' ) {
  header("Location: /home");
}