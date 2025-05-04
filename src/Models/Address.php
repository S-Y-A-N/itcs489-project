<?php

namespace Models;

class Address extends \Core\Model
{
  public function getAddress($userId, $addressId)
  {
    $query = $this->db->query("SELECT * FROM addresses WHERE user_id = :user_id and address_id = :address_id", [
      'user_id' => $userId,
      'address_id' => $addressId
    ]);

    if ($query) {
      return $query->fetch();
    } else {
      return false;
    }
  }

  public function addAddress($userId, $data)
  {
    $query = $this->db->query("INSERT INTO addresses (user_id, address, address2, city, country, postal, address_title) VALUES (:user_id, :address, :address2, :city, :country, :postal, :address_title)", [
      'user_id' => $userId,
      'address' => $data['address'],
      'address2' => $data['address2'],
      'city' => $data['city'],
      'country' => $data['country'],
      'postal' => $data['postal'], 
      'address_title' => $data['addressTitle'] ?? null
    ]);

    if ($query) {
      return true;
    } else {
      return false;
    }

  }

  public function getAddresses($userId)
  {
    $query = $this->db->query("SELECT * FROM addresses WHERE user_id = :user_id", [
      'user_id' => $userId
    ]);

    if ($query) {
      return $query->fetchAll();
    } else {
      return false;
    }
  }

}