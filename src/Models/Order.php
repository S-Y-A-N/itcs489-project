<?php

namespace Models;

class Order extends \Core\Model
{
  public function getOrder($userId, $orderId)
  {
    $query = $this->db->query("SELECT * FROM orders WHERE user_id = :user_id and order_id = :order_id", [
      'user_id' => $userId,
      'order_id' => $orderId
    ]);

    if ($query) {
      return $query->fetch();
    } else {
      return false;
    }
  }

  public function createOrder($userId, $paymentId, $addressId)
  {
    // TODO get string representation of address by ID from Address model...
    $fetchedAddress = (new Address())->getAddress($userId, $addressId);
    $orderAddress = (empty($fetchedAddress['address2']))
      ? "{$fetchedAddress['address']}, {$fetchedAddress['city']}, {$fetchedAddress['country']}, POSTAL: {$fetchedAddress['postal']}"
      : "{$fetchedAddress['address']}, {$fetchedAddress['address2']}, {$fetchedAddress['city']}, {$fetchedAddress['country']}, POSTAL: {$fetchedAddress['postal']}";

    $this->db->query("INSERT INTO orders (user_id, payment_id, order_address) VALUES (:user_id, :payment_id, :order_address)", [
      'user_id' => $userId,
      'payment_id' => $paymentId,
      'order_address' => $orderAddress,
    ]);

    $query = $this->db->query("SELECT * FROM orders WHERE order_id = LAST_INSERT_ID()");
    $orderId = $query->fetch()['order_id'];


    $cartItems = (new \Models\Cart())->get()['cart_items'];

    foreach ($cartItems as $item) {
      // decrease the stock
      $stockResult = (new \Models\Product())->decrease_stock($item['product_id'], $item['quantity']);

      if (!$stockResult) {
        return false;
      }

      $this->db->query("INSERT INTO order_items (order_id, product_id, price, quantity) VALUES (:order_id, :product_id, :price, :quantity)", [
        'order_id' => $orderId,
        'product_id' => $item['product_id'],
        'price' => $item['info']['new_price'],
        'quantity' => $item['quantity'],
      ]);
    }

    (new \Models\Cart)->delete();

    if ($query) {
      return $orderId;
    }

    return false;
  }

}