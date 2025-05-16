<?php

namespace Models;

use Core\Validator;

class Seller extends \Core\Model
{
  public $errors = [];

  public function getSellerWithCredentials($email, $password)
  {

    $query = $this->db->query("SELECT seller_id, password FROM sellers WHERE email = :email", [
      'email' => $email,
    ]);

    // if email does not exist in db
    if ($query->rowCount() === 0) {
      $this->errors['message'] = 'You entered an invalid email or password';
    } else {

      // get user data from db
      $seller = $query->fetch();
      $db_password = $seller['password'];

      // verify the entered password with hashed password
      if (password_verify($password, $db_password)) {

        // successful authentication
        return $seller;

      } else {
        $this->errors['message'] = 'You entered an invalid email or password';
      }
    }
  }

  public function getSeller($id)
  {
    $query = $this->db->query('SELECT * FROM sellers WHERE seller_id = :id', [
      'id' => $id
    ]);

    $seller = $query->fetch();

    return $seller;
  }

  public function create()
  {
    $emailPhoneQuery = $this->db->query('SELECT email, contact_no FROM sellers WHERE email = :email OR contact_no = :contact_no', [
      'email' => $_POST['email'],
      'contact_no' => $_POST['phone'],
    ]);

    // if email or phone number already registered
    if ($emailPhoneQuery->rowCount() > 0) {
      $this->errors['message'] = 'You already have an account, please login instead';
    } else {

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
      $this->db->query('INSERT INTO sellers (email, password, contact_no, brand_name) VALUES(:email, :password, :contact_no, :brand_name)', [
        'email' => $_POST['email'],
        'password' => password_hash($_POST['password'], PASSWORD_DEFAULT),
        'contact_no' => $_POST['phone'],
        'brand_name' => $_POST['brand_name'],
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