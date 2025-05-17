<?php

namespace Models;

use Core\Validator;
use PDOException;

class Seller extends \Core\Model
{
  public $errors = [];

  public function getSellerWithCredentials($email, $password)
  {

    $query = $this->db->query("SELECT * FROM sellers WHERE email = :email", [
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

  public function getAllCustomers($seller_id)
  {
    try {
      $customers = $this->db->query("
      SELECT DISTINCT u.*
        FROM orders o
          JOIN order_items oi ON o.order_id = oi.order_id
          JOIN products p ON oi.product_id = p.product_id
          JOIN users u ON o.user_id = u.user_id
            WHERE p.seller_id = :seller_id;
    ", [
        'seller_id' => $seller_id

      ])->fetchAll();

      return $customers;

    } catch (PDOException $e) {
      return false;
    }
  }

  public function getAllOrders($seller_id)
  {
    try {
      $orders = $this->db->query("
      SELECT o.*,
      SUM(oi.price * oi.quantity) AS order_revenue,
      CONCAT(u.fname, ' ', u.lname) AS customer_name,
      oi.quantity
      FROM orders o
        JOIN order_items oi ON o.order_id = oi.order_id
        JOIN products p ON oi.product_id = p.product_id
        JOIN users u ON o.user_id = u.user_id
      WHERE p.seller_id = :seller_id
      GROUP BY o.order_id, o.user_id;
    ", [
        'seller_id' => $seller_id
      ])->fetchAll();

      return $orders;

    } catch (PDOException $e) {
      return false;
    }
  }

  public function getOrdersByStatus($orders)
  {
    $grouped = [];
    foreach ($orders as $row) {
      $status = $row['status'];
      $grouped[$status][] = $row;
    }

    return $grouped;
  }

  public function getTotalRevenue($seller_id)
  {
    try {
      $totalRevenue = $this->db->query("
      SELECT SUM(oi.price * oi.quantity) AS total_revenue
      FROM order_items oi
      JOIN products p ON oi.product_id = p.product_id
      WHERE p.seller_id = :seller_id;
    ", [
        'seller_id' => $seller_id
      ])->fetch()['total_revenue'];

      $totalRevenue = number_format($totalRevenue, 2);

      return $totalRevenue;

    } catch (PDOException $e) {
      return false;
    }
  }

  public function getMonthlyRevenue($seller_id)
  {
    try {
      $monthlyRevenue = $this->db->query("
        WITH months AS (
          SELECT DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL n MONTH), '%Y-%m') AS month
          FROM (
            SELECT 0 AS n UNION ALL SELECT 1 UNION ALL SELECT 2 UNION ALL SELECT 3
            UNION ALL SELECT 4 UNION ALL SELECT 5 UNION ALL SELECT 6
            UNION ALL SELECT 7 UNION ALL SELECT 8 UNION ALL SELECT 9
            UNION ALL SELECT 10 UNION ALL SELECT 11
          ) AS nums
        ),
        revenue AS (
          SELECT
            DATE_FORMAT(o.timestamp, '%Y-%m') AS month,
            SUM(oi.price * oi.quantity) AS monthly_revenue
          FROM order_items oi
          JOIN products p ON oi.product_id = p.product_id
          JOIN orders o ON oi.order_id = o.order_id
          WHERE p.seller_id = :seller_id
            AND o.timestamp >= DATE_SUB(CURDATE(), INTERVAL 12 MONTH)
          GROUP BY DATE_FORMAT(o.timestamp, '%Y-%m')
        )
        SELECT
          m.month,
          DATE_FORMAT(STR_TO_DATE(m.month, '%Y-%m'), '%b %Y') AS month_label,
          COALESCE(r.monthly_revenue, 0) AS monthly_revenue
        FROM months m
        LEFT JOIN revenue r ON m.month = r.month
        ORDER BY m.month;
    ", [
        'seller_id' => $seller_id
      ])->fetchAll();

      return $monthlyRevenue;

    } catch (PDOException $e) {
      return $e;
    }
  }

  public function getYearlyRevenue($seller_id)
  {
    try {
      $yearlyRevenue = $this->db->query("
        WITH years AS (
          SELECT YEAR(CURDATE()) AS year
          UNION ALL
          SELECT YEAR(CURDATE()) - 1
          UNION ALL
          SELECT YEAR(CURDATE()) - 2
          UNION ALL
          SELECT YEAR(CURDATE()) - 3
          UNION ALL
          SELECT YEAR(CURDATE()) - 4
        )

        SELECT
          y.year,
          COALESCE(SUM(oi.price * oi.quantity), 0) AS yearly_revenue
        FROM years y
        LEFT JOIN orders o ON YEAR(o.timestamp) = y.year
        LEFT JOIN order_items oi ON oi.order_id = o.order_id
        LEFT JOIN products p ON oi.product_id = p.product_id
          AND p.seller_id = :seller_id
        GROUP BY y.year
        ORDER BY y.year;
    ", [
        'seller_id' => $seller_id
      ])->fetchAll();

      return $yearlyRevenue;

    } catch (PDOException $e) {
      return $e;
    }
  }
}