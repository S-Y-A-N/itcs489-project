<?php

// Deletes cookies!
// unset($_COOKIE);
// setcookie('cart','', -1, '/');

// session_set_cookie_params(2000, '/', 'localhost', true, true);
header("Cache-Control: no-cache, must-revalidate");
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();

error_log("Write to session path? ".is_writable(session_save_path()));
error_log("PHP User? ". get_current_user());
error_log("User ID session? " . ($_SESSION['user_id'] ?? 'no session'));

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