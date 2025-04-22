<?php

namespace Core;

use PDO;
use PDOException;

class Database {
  public $connection;
  public $statement;

  public function __construct($config) {
    $dsn_config = $config;
    unset($dsn_config['user']);
    unset($dsn_config['password']);
    $dsn = 'mysql:' . http_build_query($dsn_config, '', ';');
    
    try {
      $this->connection = new PDO($dsn, $config['user'], $config['password'], [
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
      ]);
    } catch (PDOException $e) {
      echo $e->getMessage();
    }
  }

  public function query($query, $params = []) {
    $this->statement = $this->connection->prepare($query);

    $this->statement->execute($params);

    return $this->statement;
  }
}