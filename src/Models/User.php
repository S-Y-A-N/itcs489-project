<?php

namespace Models;

use Core\Validator;

class User extends \Core\Model
{
  public $errors = [];

  public function create()
  {
    $emailQuery = $this->db->query('SELECT email FROM users WHERE email = :email', [
      'email' => $_POST['email']
    ]);

    $phoneQuery = $this->db->query('SELECT phone_number FROM users WHERE phone_number = :phone_number', [
      'phone_number' => $_POST['phone_full']
    ]);

    // if email or phone number already registered
    if ($emailQuery->rowCount() > 0 || $phoneQuery->rowCount() > 0) {
      $this->errors['message'] = 'You already have an account, please <a class="text-info-emphasis" href="/login">login</a> instead';
    } else {

      // if not agreed to terms & conditions
      if (!isset($_POST['agreeOnTerms'])) {
        $this->errors['terms'] = 'Not agreed to terms and conditions';
      }

      // if not a valid email
      if (!Validator::email($_POST['email'])) {
        $this->errors['email'] = 'Invalid email';
      }

      // if weak password
      if (!Validator::password_strong($_POST['password'])) {
        $this->errors['password'] = 'Invalid password';
      }

      // if passwords do not match
      else if (!Validator::password_match($_POST['password'], $_POST['password2'])) {
        $this->errors['password'] = 'Password mismatch';
      }

    }

    if (empty($this->errors)) {

      // Insert user data into the db
      $this->db->query('INSERT INTO users(email, phone_number, password, fname, lname) VALUES(:email, :phone_number, :password, :fname, :lname)', [
        'email' => $_POST['email'],
        'phone_number' => $_POST['phone_full'],
        'password' => password_hash($_POST['password'], PASSWORD_DEFAULT),
        'fname' => $_POST['fname'],
        'lname' => $_POST['lname'],
      ]);

      $this->errors['message'] = 'Regestration successful';

    }

  }

  public function update()
  {

  }

  public function delete()
  {

  }
}