<?php 

namespace Core;

// Common Controller functions
class Controller {

  public function view_page($view, $data = []) {    
    include source_path("Views/common/template.php");
  }

  public function handle_request($input) {
    $data = json_decode($input, true);
    return $data;
  }

}