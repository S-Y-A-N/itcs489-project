<?php

namespace Controllers;

class BankCard extends \Core\Controller
{
  private $model;

  public function __construct()
  {
    error_log('Address controller loaded');
    $this->model = new \Models\BankCard();

    $input = file_get_contents('php://input');
    $content_type = $_SERVER['CONTENT_TYPE'] ?? '';

    if (str_contains($content_type, 'application/json') && !empty($input)) {
      $data = json_decode($input, true);
      error_log('Received JSON data: ' . print_r($data, true));
      $userId = $_SESSION['user_id'] ?? null;
      switch ($data['action']) {
        case 'get':
          $this->getCard($userId, $data['cardId']);
          break;
        case 'add':
          $this->addCard($userId, $data);
          break;
        case 'delete':
          $this->deleteCard();
          break;
      }
    }
  }

  public function getCard($userId, $cardId)
  {
    if ($cardId) {
      $card = $this->model->getCard($userId, $cardId);
      if ($card) {
        error_log('Card fetched successfully: ' . print_r($card, true));
        echo json_encode(['success' => true, 'card' => $card]);
      } else {
        echo json_encode(['success' => false]);
      }
    }
  }

  public function addCard($userId, $data)
  {
    $newCard = $this->model->addCard($userId, $data);

    if ($newCard) {
      echo json_encode(['success' => true, 'address' => $newCard]);
    } else {
      echo json_encode(['success' => false]);
    }
  }

  public function deleteCard()
  {
    
  }

  public function updateCard()
  {
    
  }
  
}

new BankCard();