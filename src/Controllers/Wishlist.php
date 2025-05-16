<?php

namespace Controllers;

class Wishlist extends \Core\Controller
{
  private $view = 'wishlist';

  public function __construct()
  {
    $input = file_get_contents('php://input');
    $content_type = $_SERVER['CONTENT_TYPE'] ?? '';

    if (str_contains($content_type, 'application/json') && !empty($input)) {
      $data = json_decode($input, true);

      switch ($data['action']) {
        case 'remove':
          $this->remove_item($data);
          break;
        default:
          $this->index();
      }

    } else {
      $this->index();
    }
  }

  private function index()
  {
    $items = [];
    if (isset($_SESSION['user_id'])) {
      $items = (new \Models\Wishlist)->getAll($_SESSION['user_id']);
    }

    $this->view_page($this->view, [
      'items' => $items,
    ]);
  }

  public function remove_item($data)
  {
    $result = (new \Models\Wishlist())->delete($_SESSION['user_id'], $data['product_id']);

    if ($result) {
      echo json_encode(['success' => true]);
    } else {
      echo json_encode(['success' => false]);
    }
  }


}

$controller = new Wishlist();