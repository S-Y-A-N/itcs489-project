<?php

namespace Models;

class Cart extends \Core\Model
{
  public $errors = [];
















  // Returns the cart items, total quantity, and total price
  public function get(): array
  {
    if (isset($_SESSION['user_id'])) {
      $user_id = $_SESSION['user_id'];

      $cart_items = $this->db->query('SELECT * FROM cart_items WHERE user_id = :user_id', [
        'user_id' => $user_id
      ])->fetchAll();

    } else {
      $cart_items = isset($_COOKIE['cart']) ? json_decode($_COOKIE['cart'], true) : [];
    }

    $total_price = 0;
    $total_quantity = 0;

    foreach ($cart_items as &$item) {
      $product_info = (new \Models\Product())->get_id($item['product_id']);
      $total_quantity += $item['quantity'];
      $total_price += $product_info['new_price'] * $item['quantity'];

      $item['info'] = $product_info;
      $item['total_price'] = number_format($item['info']['new_price'] * $item['quantity'], 2);
    }
    unset($item);
    $total_price = number_format($total_price, 2);

    return [
      'cart_items' => $cart_items,
      'total_quantity' => $total_quantity,
      'total_price' => $total_price
    ];
  }

  // Adds an item to the cart
  public function add($data)
  {
    $product_id = $data['product_id'];
    $quantity = (int) $data['quantity'];

    // user logged in, save to db
    if (isset($_SESSION['user_id'])) {
      $user_id = $_SESSION['user_id'];

      $cart_item = $this->db->query('SELECT * FROM cart_items WHERE user_id = :user_id and product_id = :product_id', [
        'user_id' => $user_id,
        'product_id' => $product_id
      ])->fetch();

      if ($cart_item) {
        $new_quantity = $cart_item['quantity'] + $quantity;

        // check if quantity exceeds 5
        if ($new_quantity > 5) {

          echo json_encode([
            'success' => false
          ]);
          return;

        } else {

          $this->db->query('UPDATE cart_items SET quantity = :quantity WHERE user_id = :user_id AND product_id = :product_id', [
            'quantity' => $new_quantity,
            'user_id' => $user_id,
            'product_id' => $product_id
          ]);

        }
      } else {

        // if cart item does not exist, insert new item
        $this->db->query('INSERT INTO cart_items (user_id, product_id, quantity) VALUES (:user_id, :product_id, :quantity)', [
          'user_id' => $user_id,
          'product_id' => $product_id,
          'quantity' => $quantity
        ]);

      }

      echo json_encode([
        'success' => true,
      ]);
      return;

    }

    // user not logged in, save in cookie
    else {
      $cart = isset($_COOKIE['cart']) ? json_decode($_COOKIE['cart'], true) : [];
      $found = false;

      // update quantity if product exists in cart
      foreach ($cart as &$item) {
        if ($item['product_id'] == $product_id) {
          if ($item['quantity'] < 5) {
            $item['quantity'] += $quantity;
          } else {
            echo json_encode([
              'success' => false,
            ]);
            return;
          }
          $found = true;
          break;
        }
      }
      unset($item);

      // If not found, add new item
      if (!$found) {
        $cart[] = [
          'product_id' => $product_id,
          'quantity' => $quantity
        ];
      }

      setcookie('cart', json_encode($cart), time() + (86400 * 7), "/");

      echo json_encode([
        'success' => true,
      ]);
    }


  }

  // Update the quantity of an item in the cart
  public function updateQuantity($data)
  {
    $product_id = $data['product_id'];
    $quantity = $data['quantity'];


    if (isset($_SESSION['user_id'])) {
      $user_id = $_SESSION['user_id'];

      $cart_item = $this->db->query('SELECT * FROM cart_items WHERE user_id = :user_id AND product_id = :product_id', [
        'user_id' => $user_id,
        'product_id' => $product_id
      ])->fetch();

      if ($cart_item) {
        $this->db->query('UPDATE cart_items SET quantity = :quantity WHERE user_id = :user_id AND product_id = :product_id', [
          'quantity' => $quantity,
          'user_id' => $user_id,
          'product_id' => $product_id
        ]);
      } else {
        $this->add($data);
      }

    } else {

      $cart_items = isset($_COOKIE['cart']) ? json_decode($_COOKIE['cart'], true) : [];
      $quantity = (int) $data['quantity'];

      foreach ($cart_items as &$item) {
        if ($item['product_id'] == $data['product_id']) {
          $item['quantity'] = $quantity;
          break;
        }
      }
      unset($item);

      setcookie('cart', json_encode($cart_items), time() + (86400 * 7), "/");
      $_COOKIE['cart'] = json_encode($cart_items); // important to update the cookies immediately
    }

    $this->updateTotals();
  }




  public function removeItem($data)
  {
    $product_id = $data['product_id'];

    if (isset($_SESSION['user_id'])) {
      $user_id = $_SESSION['user_id'];

      $removedItem = $this->db->query('DELETE FROM cart_items WHERE user_id = :user_id AND product_id = :product_id', [
        'user_id' => $user_id,
        'product_id' => $product_id
      ])->fetch();

      error_log($removedItem);

    } else {

      $cart_items = isset($_COOKIE['cart']) ? json_decode($_COOKIE['cart'], true) : [];

      foreach ($cart_items as $key => $item) {
        if ($item['product_id'] == $product_id) {
          unset($cart_items[$key]);
          break;
        }
      }

      setcookie('cart', json_encode($cart_items), time() + (86400 * 7), "/");
      $_COOKIE['cart'] = json_encode($cart_items); // important to update the cookies immediately
    }

    $this->updateTotals();
  }







  private function updateTotals()
  {
    if (isset($_SESSION['user_id'])) {
      $user_id = $_SESSION['user_id'];

      $cart_items = $this->db->query('SELECT * FROM cart_items WHERE user_id = :user_id', [
        'user_id' => $user_id
      ])->fetchAll();

      error_log("Cart items: " . print_r($cart_items, true));

    } else {
      $cart_items = isset($_COOKIE['cart']) ? json_decode($_COOKIE['cart'], true) : [];
    }

    $total_quantity = 0;
    $total_price = 0;

    foreach ($cart_items as $item) {
      $product_info = (new \Models\Product())->get_id($item['product_id']);
      $total_quantity += $item['quantity'];
      $total_price += $product_info['new_price'] * $item['quantity'];
    }

    $total_price = number_format($total_price, 2);

    echo json_encode([
      'success' => true,
      'total_price' => $total_price,
      'total_quantity' => $total_quantity
    ]);
  }


}
