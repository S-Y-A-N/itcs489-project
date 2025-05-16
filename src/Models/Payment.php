<?php

namespace Models;

class Payment extends \Core\Model
{
  public function getPayment($userId, $paymentId)
  {
    $query = $this->db->query("SELECT * FROM payments WHERE user_id = :user_id and payment_id = :payment_id", [
      'user_id' => $userId,
      'payment_id' => $paymentId
    ]);

    if ($query) {
      return $query->fetch();
    } else {
      return false;
    }
  }

  public function processPayment($userId, $amount, $paymentMethod)
  {
    $this->db->query("INSERT INTO payments (user_id, amount, method) VALUES (:user_id, :amount, :method)", [
      'user_id' => $userId,
      'amount' => $amount,
      'method' => $paymentMethod,
    ]);

    $query = $this->db->query("SELECT * FROM payments WHERE payment_id = LAST_INSERT_ID()");

    if ($query) {
      return $query->fetch();
    }

    return false;
  }

}