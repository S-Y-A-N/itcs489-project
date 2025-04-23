<?php

namespace Core;

// Common Model functions
class Model {
  public $db;

  public function __construct() {
    $config = require source_path('Core/config.php');
    $this->db = new \Core\Database($config['database']);
  }
}