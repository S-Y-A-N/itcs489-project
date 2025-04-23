<?php

session_start();

// Requires every file we need at app initialization
require __DIR__ . '/../src/Core/init.php';

// Autoloads the classes
function class_autoloader($class) {
  $class = str_replace("\\", DIRECTORY_SEPARATOR, $class);
  include source_path("{$class}.php");
}

spl_autoload_register('class_autoloader');


// Runs the app
$app = new \Core\App();