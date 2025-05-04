<?php

namespace Models;

class BankCard extends \Core\Model
{
  public function getCard($userId, $cardId)
  {
    $query = $this->db->query("SELECT * FROM cards WHERE user_id = :user_id and card_id= :card_id", [
      'user_id' => $userId,
      'card_id' => $cardId
    ]);

    if ($query) {
      return $query->fetch();
    } else {
      return false;
    }
  }

  public function addCard($userId, $data)
  {

    $query = $this->db->query("INSERT INTO cards (user_id, card_number, expiry_date, card_name, cvv) VALUES (:user_id, :card_number, :expiry_date, :card_name, :cvv)", [
      'user_id' => $userId,
      'card_number' => $data['card_number'],
      'expiry_date' => $data['expiry_date'],
      'card_name' => $data['card_name'],
      'cvv' => $data['cvv']
    ]);

    if ($query) {
      return true;
    } else {
      return false;
    }
  }

  public function getCards($userId)
  {
    $query = $this->db->query("SELECT * FROM cards WHERE user_id = :user_id", [
      'user_id' => $userId
    ]);

    if ($query) {
      return $query->fetchAll();
    } else {
      return false;
    }
  }

}