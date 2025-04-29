<?php

namespace Models;

class Seller extends \Core\Model
{
  public $errors = [];

  public function get_seller($id)
  {
    $query = $this->db->query('SELECT * FROM sellers WHERE seller_id = :id', [
      'id' => $id
    ]);

    $seller = $query->fetch();

    return $seller;
  }

  public function create()
  {
  
  }

  public function update()
  {

  }

  public function delete()
  {

  }
}