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
      $userId = $_SESSION['user_id'] ?? null;
      switch ($data['action']) {
        case 'get':
          $this->getAddress($userId, $data['addressId']);
          break;
        case 'add':
          $this->addAddress($userId, $data);
          break;
        case 'delete':
          $this->deleteAddress();
          break;
      }
    }
  }

  public function getAddress($userId, $addressId)
  {
    if ($addressId) {
      $address = $this->model->getAddress($userId, $addressId);
      if ($address) {
        error_log('Address fetched successfully: ' . print_r($address, true));
        echo json_encode(['success' => true, 'address' => $address]);
      } else {
        echo json_encode(['success' => false]);
      }
    }
  }

  public function addAddress($userId, $data)
  {
    $newAddress = $this->model->addAddress($userId, $data);
    error_log('New address data: ' . print_r($newAddress, true));

    if ($newAddress) {
      echo json_encode(['success' => true, 'address' => $newAddress]);
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