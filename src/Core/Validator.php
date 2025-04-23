<?php

// Write all validation functions here

namespace Core;

class Validator {
  public static function email($value) {
    return filter_var($value, FILTER_VALIDATE_EMAIL);
  }

  public static function password_strong($value) {
    $uppercase = preg_match('/[A-Z]/', $value);
    $lowercase = preg_match('/[a-z]/', $value);
    $number    = preg_match('/[0-9]/', $value);
    $specialChar = preg_match('/[\W]/', $value);
    $length = preg_match('/\S{8,}/', $value);

    return $uppercase && $lowercase && $number && $specialChar && $length ? true : false;
  }

  public static function password_match($p1, $p2) {
    return $p1 === $p2;
  }

  public static function post($name) {
    return $_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST[$name]);
  }

  public static function username($u) {
    return preg_match('/^[-\w\s]+$/i', $u) && Validator::string_length($u, 1, 20);
  }

  public static function string_length($str, $min = 0, $max = 100) {
    return strlen($str) >= $min && strlen($str) <= $max;
  }
}