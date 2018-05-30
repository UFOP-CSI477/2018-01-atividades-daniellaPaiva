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

  public function create($name, $price){
    session_start();
    $user_id = $_SESSION['user'];
    try {
      $sql = "INSERT INTO procedures (user_id, name, price)
      VALUES (:user_id, :name, :price)";

      $result = $this->db->prepare($sql);
      $result->bindParam(':user_id', $user_id, PDO::PARAM_INT);
      $result->bindParam(':name', $name, PDO::PARAM_STR);
      $result->bindParam(':price', $price, PDO::PARAM_STR);
      return $result->execute();
    } catch (PDOException $e) {
      echo "ERROR" . $e->getMessage();
    }
  }

  public function select($id){
  	session_start();
    $user_id = $_SESSION['user'];
    try {
      $sql = "SELECT * FROM procedures WHERE id=:id";

      $result = $this->db->prepare($sql);
      $result->bindParam(':id', $id, PDO::PARAM_INT);
      $result->execute();

      return $result->fetch(PDO::FETCH_ASSOC);

    } catch (PDOException $e) {
      echo "ERROR" . $e->getMessage();
    }
  }

  public function verifica($name){
    try {
      $sql = "SELECT * FROM procedures WHERE name=:name";

      $result = $this->db->prepare($sql);
      $result->bindParam(':name', $name, PDO::PARAM_STR);
      $result->execute();

      return $result->rowCount();

    } catch (PDOException $e) {
      echo "ERROR" . $e->getMessage();
    }
  }

  public function update($request){
    session_start();
    $user_id = $_SESSION['user'];

    $procedure_id = $request['procedure_id'];
    $name = $request['name'];
    $price = $request['price'];

    try {
      $sql = "UPDATE procedures SET name=:name, price=:price
      WHERE id=:procedure_id";

      $result = $this->db->prepare($sql);
      $result->bindParam(':procedure_id', $procedure_id, PDO::PARAM_INT);
      $result->bindParam(':name', $name, PDO::PARAM_STR);
      $result->bindParam(':price', $price, PDO::PARAM_STR);
      return $result->execute();
    } catch (PDOException $e) {
      echo "ERROR" . $e->getMessage();
    }
  }  

  public function delete($id){
  	session_start();
    $user_id = $_SESSION['user'];
    try {
      $sql = "DELETE FROM procedures WHERE id=:id";

      $result = $this->db->prepare($sql);
      $result->bindParam(':id', $id, PDO::PARAM_INT);
      return $result->execute();
    } catch (PDOException $e) {
      echo "ERROR" . $e->getMessage();
    }
  }

}
