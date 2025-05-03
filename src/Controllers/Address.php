<?php

namespace Controllers;

class Address extends \Core\Controller
{
  private $model;

  public function __construct()
  {
    error_log('Address controller loaded');
    $this->model = new \Models\Address();

    $input = file_get_contents('php://input');
    $content_type = $_SERVER['CONTENT_TYPE'] ?? '';

    if (str_contains($content_type, 'application/json') && !empty($input)) {
      $data = json_decode($input, true);

      error_log('Received JSON data: ' . print_r($data, true));

      switch ($data['action']) {
        case 'add':
          $this->addAddress($data);
          break;
        case 'delete':
          $this->deleteAddress();
          break;
      }
    }
  }

  public function addAddress($data)
  {
    $userId = $_SESSION['user_id'];

    if ($this->model->addAddress($userId, $data)) {
      echo json_encode(['success' => true]);
    } else {
      echo json_encode(['success' => false]);
    }
  }

  public function deleteAddress()
  {
    
  }

  public function updateAddress()
  {
    
  }
  
}

new Address();