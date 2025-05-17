<?php

namespace Models;

class Admin extends \Core\Model
{
  public $errors = [];

  // get existing user from db
  public function getAdminWithCredentials($email, $password)
  {
    $query = $this->db->query("SELECT * FROM admins WHERE email = :email", [
      'email' => $email
    ]);

    // if email does not exist in db
    if ($query->rowCount() === 0) {
      $this->errors['message'] = 'You entered an invalid email or password';
    } else {

      // get user data from db
      $admin = $query->fetch();
      $db_password = $admin['password'];

      // verify the entered password with hashed password
      if (password_verify($password, $db_password)) {

        // successful authentication
        return $admin;

      } else {
        $this->errors['message'] = 'You entered an invalid email or password';
      }

    }
  }
}