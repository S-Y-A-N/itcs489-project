<?php

// Deletes cookies!
// unset($_COOKIE);
// setcookie('cart','', -1, '/');

// session_set_cookie_params(2000, '/', 'localhost', true, true);
session_start();

// Requires every file we need at app initialization
require __DIR__ . '/../src/Core/init.php';

// Autoloads (includes) the classes
function class_autoloader($class)
{
  $class = str_replace("\\", DIRECTORY_SEPARATOR, $class);
  include source_path("{$class}.php");
}

spl_autoload_register('class_autoloader');


// Runs the app
$app = new \Core\App();