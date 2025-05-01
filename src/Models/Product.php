<?php

namespace Models;

class Product extends \Core\Model
{
  public function calculateNewPrice($price, $offer): float {
    return $price - $price * $offer;
  }

  public function get_id($id): array {
    $query = $this->db->query('SELECT * FROM products WHERE product_id = :id', [
      'id' => $id
    ]);

    $product = $query->fetch();

    // calculate new price
    $product['new_price'] = number_format($this->calculateNewPrice($product['price'], $product['offer']),2);
    $product['offer'] = number_format( $product['offer'],2);

    return $product;
  }

  public function get_all(): array
  {
    $query = $this->db->query('SELECT * FROM products');

    $products = $query->fetchAll();

    $seller_model = new \Models\Seller();

    foreach ($products as &$p) {
      $seller = $seller_model->get_seller($p['seller_id']);
      $p['new_price'] = $p['price'] - $p['price']*$p['offer'];
      $p['brand_name'] = $seller['brand_name'];
    }
    unset($p);

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