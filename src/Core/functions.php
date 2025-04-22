<?php

use Core\Response;

function dump($value) {
  echo '<pre>';
  var_dump($value);
  echo '</pre>';
}

function dd($value) {
  dump($value);
  die();
}

function source_path($path) {
  return SOURCE_PATH . $path;
}

function public_path($path) {
  return PUBLIC_PATH . $path;
}

function authorize($condition) {
  if (! $condition) {
    abort(Response::FORBIDDEN);
  }
}

function abort($code = Response::NOT_FOUND)
{
  http_response_code($code);
  view_page("error/{$code}");
  die();
}

function view_page($view, $data = []) {    
  include source_path("Views/common/template.php");
}

function render($view, $data = []) {
  extract($data);
  include source_path("Views/{$view}.php");
}