<?php

namespace Model;

use PDO;
use Model\Test;

class Test {

  protected $db = null;

  public function __construct() {
    $this->db = Database::getInstance()->getDB();
  }

  public function all() {
    $sql = "SELECT * FROM tests ORDER BY id";
    return $this->db->query($sql);
  }

  function formatarData($date){
      $rData = date('Y-m-d',strtotime($date));
      return $rData;
   }

  public function select($id){
  	session_start();
    $user_id = $_SESSION['user'];
    try {
      $sql = "SELECT * FROM tests WHERE id=:id";

      $result = $this->db->prepare($sql);
      $result->bindParam(':id', $id, PDO::PARAM_INT);
      $result->execute();

      return $result->fetch(PDO::FETCH_ASSOC);

    } catch (PDOException $e) {
      echo "ERROR" . $e->getMessage();
    }
  }

  public function update($request){
    session_start();
    $user_id = $_SESSION['user'];

    $test_id = $request['test_id'];
    $procedure_id = $request['procedure_id'];
    $date_test = $request['date_test'];

    $date_test = Test::formatarData($date_test);
    
    try {
      $sql = "UPDATE tests SET procedure_id=:procedure_id, date_test=:date_test
      WHERE id=:test_id";

      $result = $this->db->prepare($sql);
      $result->bindParam(':procedure_id', $procedure_id, PDO::PARAM_INT);
      $result->bindParam(':date_test', $date_test, PDO::PARAM_STR);
      $result->bindParam(':test_id', $test_id, PDO::PARAM_INT);
      return $result->execute();
    } catch (PDOException $e) {
      echo "ERROR" . $e->getMessage();
    }
  }

  public function delete($id){
  	session_start();
    $user_id = $_SESSION['user'];
    try {
      $sql = "DELETE FROM tests WHERE id=:id";

      $result = $this->db->prepare($sql);
      $result->bindParam(':id', $id, PDO::PARAM_INT);
      return $result->execute();
    } catch (PDOException $e) {
      echo "ERROR" . $e->getMessage();
    }
  }

}
