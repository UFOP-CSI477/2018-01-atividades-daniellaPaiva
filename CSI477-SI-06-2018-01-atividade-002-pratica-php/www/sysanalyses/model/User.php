<?php

namespace Model;

use PDO;
use Model\User;

class User {

  protected $db = null;

  public function __construct() {
    $this->db = Database::getInstance()->getDB();
  }

  public function all() {
    $sql = "SELECT * FROM users ORDER BY id";
    return $this->db->query($sql);
  }

  public function all_patients() {
      $sql = "SELECT id as user_id FROM users WHERE type=3";
      return $this->db->query($sql);
  }

   public function create($name, $email, $password, $type){
    session_start();
    $user_id = $_SESSION['user'];
    try {
      $sql = "INSERT INTO users (name, email, password, type)
      VALUES (:name, :email, :password, :type)";

      $result = $this->db->prepare($sql);
      $result->bindParam(':name', $name, PDO::PARAM_STR);
      $result->bindParam(':email', $email, PDO::PARAM_STR);
      $result->bindParam(':password', $password, PDO::PARAM_STR);
      $result->bindParam(':type', $type, PDO::PARAM_INT);
      return $result->execute();
    } catch (PDOException $e) {
      echo "ERROR" . $e->getMessage();
    }
  }

  //Editar user
  public function editar($id){
    session_start();
    $user_id = $_SESSION['user'];
    try {
      $sql = "SELECT * FROM users WHERE id=:id";

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

    $id = $request['user_id'];
    $name = $request['name'];
    $email = $request['email'];
    $password = $request['password'];
    $type = $request['type'];

    try {
      $sql = "UPDATE users SET name=:name, email=:email, password=:password, type=:type
      WHERE id=:id";

      $result = $this->db->prepare($sql);
      $result->bindParam(':name', $name, PDO::PARAM_STR);
      $result->bindParam(':email', $email, PDO::PARAM_STR);
      $result->bindParam(':password', $password, PDO::PARAM_STR);
      $result->bindParam(':type', $type, PDO::PARAM_INT);
      $result->bindParam(':id', $id, PDO::PARAM_INT);
      return $result->execute();
    } catch (PDOException $e) {
      echo "ERROR" . $e->getMessage();
    }
  }

  public function delete($id){
    session_start();
    $user_id = $_SESSION['user'];
    try {
      $sql = "DELETE FROM users WHERE id=:id";

      $result = $this->db->prepare($sql);
      $result->bindParam(':id', $id, PDO::PARAM_INT);
      return $result->execute();
    } catch (PDOException $e) {
      echo "ERROR" . $e->getMessage();
    }
  }

  // Verifica se usuário existe no baco de dados
  // Cria a sessão [user, type]
  public function validaDados($email, $password){ 
    $sql = "SELECT * FROM users WHERE email =:email AND password =:password";

    try{

      //Prepara a consulta e executa
      $result = $this->db->prepare($sql);
      $result->bindParam(':email', $email, PDO::PARAM_STR);
      $result->bindParam(':password', $password, PDO::PARAM_STR);
      $result->execute();

       //Conta os registros de retorno
      $contar = $result->rowCount();

      //Usuário existe
      if($contar>0){
        //Recupera objeto de retorno da consulta
        $user = $result->fetch(PDO::FETCH_ASSOC);

        $id = $user['id'];
        $type = $user['type'];


        $_SESSION['user'] = $id;
        $_SESSION['type'] = $type;
        return true;

      } else{
          session_destroy();
          return false;        
     }

   } catch(PDOException $e)
   { 
    echo "ERROR" . $e->getMessage();
  }
}

public function cadastroPaciente($name,$email,$password){
  try {
    $type = 3;
    $sql = "INSERT INTO users (name, email, password, type)
    VALUES (:name, :email, :password, :type)";

    $result = $this->db->prepare($sql);
    $result->bindParam(':name', $name, PDO::PARAM_STR);
    $result->bindParam(':email', $email, PDO::PARAM_STR);
    $result->bindParam(':password', $password, PDO::PARAM_STR);
    $result->bindParam(':type', $type, PDO::PARAM_INT);
    return $result->execute();
  } catch (PDOException $e) {
    echo "ERROR" . $e->getMessage();
  }
}



public function atualizar($request){
  var_dump($resquest);
}


}
