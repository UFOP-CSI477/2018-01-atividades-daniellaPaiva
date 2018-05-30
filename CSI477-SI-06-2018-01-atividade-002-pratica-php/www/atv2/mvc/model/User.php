<?php

namespace Model;

use PDO;
use Model\Database;


class User {

  protected $db = null;

  public function __construct() {
    $this->db = Database::getInstance()->getDB();
  }

  public function all() {
    $sql = "SELECT * FROM users ORDER BY id";
    return $this->db->query($sql);
  }

  public function validaDados($email, $password){ 
    session_start();
  	$sql = "SELECT * FROM users WHERE email =:email AND password =:password";

  	try
   {

    //Prepara a consulta e executa
    $result = $this->db->prepare($sql);
    $result->bindParam(':email', $email, PDO::PARAM_STR);
    $result->bindParam(':password', $password, PDO::PARAM_STR);
    $result->execute();

     //Conta os registros de retorno
    $contar = $result->rowCount();

    if($contar>0){
     	//Recupera objeto de retorno da consulta
      $user = $result->fetch(PDO::FETCH_ASSOC);

      $id = $user['id'];
      $type = $user['type'];
     

      $_SESSION['usuario'] = $id;
      $_SESSION['type'] = $type;
      return true;
     
   } else{
     return false;		    
   }

 } catch(PDOException $e)
 { 
  echo "ERROR" . $e->getMessage();
}
}

public function cadastroPaciente($name,$email,$password){
  session_start();
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
}
