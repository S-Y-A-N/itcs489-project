<?php

namespace Models;

use Core\Validator;

class User extends \Core\Model
{
  public $errors = [];

  // get existing user from db
  public function get_user_with_credentials($login_type, $identifier, $password)
  {
    if ($login_type != 'email' && $login_type != 'phone') {
      $this->errors['message'] = 'Invalid login method';
      exit;
    }

    $query = $this->db->query("SELECT email, phone, password FROM users WHERE $login_type = :identifier", [
      'identifier' => $identifier
    ]);

    // if email does not exist in db
    if ($query->rowCount() === 0) {
      $this->errors['error'] = 'You entered an invalid email or password';
    } else {

      // get user data from db
      $user = $query->fetch();
      $db_password = $user['password'];

      // verify the entered password with hashed password
      if (password_verify($password, $db_password)) {

        // successful authentication
        return $user;

      } else {
        $this->errors['message'] = 'You entered an invalid email or password';
      }

    }


  }

  // create new user
  public function create()
  {
    $emailQuery = $this->db->query('SELECT email FROM users WHERE email = :email', [
      'email' => $_POST['email']
    ]);

    $phoneQuery = $this->db->query('SELECT phone FROM users WHERE phone = :phone', [
      'phone' => $_POST['phone']
    ]);

    // if email or phone number already registered
    if ($emailQuery->rowCount() > 0 || $phoneQuery->rowCount() > 0) {
      $this->errors['message'] = 'You already have an account, please <a class="text-info-emphasis" href="/login">login</a> instead';
    } else {

      // if not agreed to terms & conditions
      if (!Validator::post('agreeOnTerms')) {
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
      $this->db->query('INSERT INTO users(email, phone, password, fname, lname) VALUES(:email, :phone, :password, :fname, :lname)', [
        'email' => $_POST['email'],
        'phone' => $_POST['phone'],
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