<?php

namespace Model;

use PDO;
use Model\Procedure;

class Procedure {

  protected $db = null;

  public function __construct() {
    $this->db = Database::getInstance()->getDB();
  }

  public function all() {
    $sql = "SELECT * FROM procedures ORDER BY id";
    return $this->db->query($sql);
  }

  public function novo($user_id, $name, $price){
  	try {
    $sql = "INSERT INTO procedures (name, price, user_id)
    VALUES (:name, :price, :user_id)";

    $result = $this->db->prepare($sql);
    $result->bindParam(':name', $name, PDO::PARAM_STR);
    $result->bindParam(':price', $price, PDO::PARAM_STR);
    $result->bindParam(':user_id', $user_id, PDO::PARAM_INT);
    return $result->execute();
  	} catch (PDOException $e) {
    	echo "ERROR" . $e->getMessage();
  	}

  }






}
