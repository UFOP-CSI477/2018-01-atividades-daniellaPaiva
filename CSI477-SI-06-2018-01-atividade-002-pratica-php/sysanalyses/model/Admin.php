<?php

namespace Model;

use PDO;
use Model\Database;


class Admin {

  protected $db = null;

  public function __construct() {
    $this->db = Database::getInstance()->getDB();
  }
 

}
