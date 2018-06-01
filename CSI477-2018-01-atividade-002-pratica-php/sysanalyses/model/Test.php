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
    $sql = "SELECT  tests.user_id, tests.procedure_id, tests.date_test, 
                    procedures.name as proc_name, procedures.price, users.name as user_name, users.email FROM tests 
            INNER JOIN procedures ON tests.procedure_id = procedures.id  
            INNER JOIN users ON tests.user_id = users.id
            ORDER BY tests.date_test";
    return $this->db->query($sql);
  }

  //Retorna todos os exames do paciente
  public function user_tests($user_id) {
    try{
      $sql = "SELECT  tests.id, tests.date_test, procedures.name, procedures.price FROM tests
          INNER JOIN procedures ON tests.procedure_id = procedures.id  
          WHERE tests.user_id=:user_id ORDER BY tests.date_test DESC, procedures.name ASC";
      $result = $this->db->prepare($sql);
      $result->bindParam(':user_id', $user_id, PDO::PARAM_INT);
      $result->execute();

      return $result->fetchAll(PDO::FETCH_ASSOC);

    } catch(PDOException $e){
      echo "ERROR" . $e->getMessage();
    }
  }

  function formatarData($date){
      $rData = date('Y-m-d',strtotime($date));
      return $rData;
   }


   //Novo exame
  public function create($proc_list, $date){
    session_start();
    $date_test = Test::formatarData($date);
    $user_id = $_SESSION['user'];
    try {
      foreach($proc_list as $proc){
        $sql = "INSERT INTO tests (user_id, procedure_id, date_test)
        VALUES (:user_id, :proc, :date_test)";

        $result = $this->db->prepare($sql);
        $result->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        $result->bindParam(':proc', $proc, PDO::PARAM_INT);
        $result->bindParam(':date_test', $date_test, PDO::PARAM_STR);
        $result->execute();
      }
      return true;
    } catch (PDOException $e) {
      echo "ERROR" . $e->getMessage();
    }
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

  //Excluir procedimento - Verifica se tem testes com o procedure_id a ser excluído
  public function verifica_delete_procedure($id){
    session_start();
    $user_id = $_SESSION['user'];
    try {
      $sql = "SELECT tests.id, tests.procedure_id, procedures.id FROM tests 
              INNER JOIN procedures ON tests.procedure_id = procedures.id 
              WHERE procedure_id=:id";

      $result = $this->db->prepare($sql);
      $result->bindParam(':id', $id, PDO::PARAM_INT);
      $result->execute();

      return $result->fetch(PDO::FETCH_ASSOC);

    } catch (PDOException $e) {
      echo "ERROR" . $e->getMessage();
    }
  }

   //Excluir usuário - Verifica se tem testes com o user_id a ser excluído
  public function verifica_delete_user($id){
    session_start();
    $user_id = $_SESSION['user'];
    try {
      $sql = "SELECT tests.id, tests.user_id, users.id FROM tests 
              INNER JOIN users ON tests.user_id = users.id 
              WHERE user_id=:id";

      $result = $this->db->prepare($sql);
      $result->bindParam(':id', $id, PDO::PARAM_INT);
      $result->execute();

      return $result->fetch(PDO::FETCH_ASSOC);

    } catch (PDOException $e) {
      echo "ERROR" . $e->getMessage();
    }
  }

  /*Retorna: userId, 
             user_name,
             email,
             valor
             quantidade
    */
  public function relatorio_patients() {
    $sql = "SELECT DISTINCT users.id as userId, users.name as user_name, users.email,
            SUM(procedures.price) as valor, 
            COUNT(procedures.id) as quantidade FROM tests 
            INNER JOIN procedures ON procedures.id = tests.procedure_id 
            INNER JOIN users ON tests.user_id = users.id 
            WHERE tests.user_id = users.id 
            GROUP BY users.name";

    
    return $this->db->query($sql);
  }

  /*Retorna: name, 
             price,
             quantidade
    */
  public function relatorio_procedures() {
    $sql = "SELECT DISTINCT procedures.name, procedures.price,
            COUNT(procedures.id) as quantidade FROM tests 
            INNER JOIN procedures ON procedures.id = tests.procedure_id 
            GROUP BY procedures.name";

    return $this->db->query($sql);
  }

}
