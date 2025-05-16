<?php

namespace Models;

use PDOException;


class Product extends \Core\Model
{
  public function calculateNewPrice($price, $offer): float
  {
    return $price - $price * $offer;
  }

  public function extendPriceAndBrand($products)
  {
    foreach ($products as &$p) {
      $p['new_price'] = number_format($this->calculateNewPrice($p['price'], $p['offer']), 2);
      $p['offer'] = number_format($p['offer'], 2);

      $seller = (new \Models\Seller())->getSeller($p['seller_id']);
      $p['brand_name'] = $seller['brand_name'];
    }
    unset($p);

    return $products;
  }

  public function searchProducts($searchTerm)
  {
    if ($searchTerm) {

      // simple sql search...
      $products = $this->db->query("
SELECT 
    p.*, 
    c.name AS category_name, 
    s.brand_name AS brand_name
FROM products p
JOIN categories c ON p.category_id = c.category_id
JOIN sellers s ON p.seller_id = s.seller_id
WHERE MATCH(p.name, p.description) AGAINST (:search IN NATURAL LANGUAGE MODE)
   OR MATCH(c.name) AGAINST (:search IN NATURAL LANGUAGE MODE)
   OR MATCH(s.brand_name) AGAINST (:search IN NATURAL LANGUAGE MODE)
   OR p.name LIKE :likeSearch
   OR p.description LIKE :likeSearch
   OR c.name LIKE :likeSearch
   OR s.brand_name LIKE :likeSearch
      ", [
        'likeSearch' => '%' . $searchTerm . '%',
        'search' => $searchTerm
      ])->fetchAll();

      $products = $this->extendPriceAndBrand($products);


      return $products;
    }
  }


  public function get_id($id): array
  {
    $query = $this->db->query('SELECT * FROM products WHERE product_id = :id', [
      'id' => $id
    ]);

    $product = $query->fetch();

    // calculate new price
    $product['new_price'] = number_format($this->calculateNewPrice($product['price'], $product['offer']), 2);
    $product['offer'] = number_format($product['offer'], 2);

    return $product;
  }

  public function get_all(): array
  {
    $query = $this->db->query('SELECT * FROM products');

    $products = $query->fetchAll();

    $seller_model = new \Models\Seller();

    $products = $this->extendPriceAndBrand($products);

    return $products;
  }

  public function decrease_stock($productId, $quantity)
  {
    try {
      $this->db->query("UPDATE products SET stock = stock - :quantity WHERE product_id = :product_id AND stock >= :quantity", [
        'quantity' => $quantity,
        'product_id' => $productId
      ]);

      return true;

    } catch (PDOException $e) {
      error_log("Error: Products (decrese_stock): $e");

      return false;
    }
  }

  public function get_offer()
  {

  }

  public function getProductsByCategory($categoryCodeName)
  {
    $products = $this->db->query("
        SELECT products.* 
        FROM products
        JOIN categories ON products.category_id = categories.category_id
        WHERE categories.code_name = :category
    ", [
      'category' => $categoryCodeName,
    ])->fetchAll();

    $products = $this->extendPriceAndBrand($products);


    return $products;
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