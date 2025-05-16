<?php

namespace Models;

use PDOException;


class Wishlist extends \Core\Model
{

  public function add($user_id, $product_id)
  {
    try {

      $query = $this->db->query("SELECT * FROM wishlist_items WHERE user_id = :user_id AND product_id = :product_id", [
        'user_id' => $user_id,
        'product_id' => $product_id,
      ]);
      error_log($query->rowCount());
      if ($query->rowCount() === 0) {

        $this->db->query("INSERT INTO wishlist_items (user_id, product_id) VALUES (:user_id, :product_id)", [
          'user_id' => $user_id,
          'product_id' => $product_id,
        ]);

        echo json_encode(['success' => true, 'message' => 'Item added to your wishlist.']);
        return true;

      } else {

        echo json_encode(['success' => false, 'message' => 'You already have this item in your wishlist.']);
        return false;

      }
    } catch (PDOException $e) {
      echo json_encode(['success' => false, 'message' => 'A server error occured. Please try again.']);

      return false;
    }
  }

  public function getAll($user_id)
  {
    try {
      $items = $this->db->query("SELECT wi.*, p.* FROM wishlist_items wi JOIN products p ON wi.product_id = p.product_id WHERE user_id = :user_id", [
        'user_id' => $user_id,
      ])->fetchAll();

      $items = (new \Models\Product())->extendPriceAndBrand($items);

      return $items;

    } catch (PDOException $e) {
      return false;
    }
  }

  public function update()
  {
    try {

    } catch (PDOException $e) {

    }
  }

  public function delete($user_id, $product_id)
  {
    try {
      $this->db->query("DELETE FROM wishlist_items WHERE user_id = :user_id AND product_id = :product_id", [
        'user_id' => $user_id,
        'product_id' => $product_id,
      ]);
      
      return true;
    } catch (PDOException $e) {
      return false;
    }
  }
}