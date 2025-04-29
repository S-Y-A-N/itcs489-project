<?php

namespace Models;

class Product extends \Core\Model
{
  public function get_all(): array
  {
    $query = $this->db->query('SELECT * FROM products');

    $products = $query->fetchAll();

    return $products;
  }

  public function get_offer()
  {
   
  }

  public function get_category()
  {
   
  }

  public function get_search()
  {
   
  }

  public function get_seller()
  {
   
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