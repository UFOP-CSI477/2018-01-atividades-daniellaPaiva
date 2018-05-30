<?php

namespace Model;

use Model\Database;

class Test {

  protected $db = null;

  public function __construct() {
    $this->db = Database::getInstance()->getDB();
  }

  public function all() {
    $sql = "SELECT tests.id, tests.date_test, users.email, procedures.name FROM tests 
			INNER JOIN users ON tests.user_id = users.id
			INNER JOIN procedures ON tests.procedure_id = procedures.id
    		ORDER BY tests.date_test DESC, procedures.name ASC";
    return $this->db->query($sql);
  }






}
