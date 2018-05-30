<?php

namespace Model;

use PDO;
use Model\Database;


class Admin {

  protected $db = null;

  public function __construct() {
    $this->db = Database::getInstance()->getDB();
  }

  public function verifica($email){
  	try {
	   $sql = "SELECT * FROM users WHERE email =:email";
	   $result = $this->db->prepare($sql);
	   $result->bindParam(':email', $email, PDO::PARAM_STR);
	   $result->execute();

	    //Conta os registros da tabela
	    $contar = $result->rowCount();

	    if($contar>0){
	    	return true;
	    } else {
	    	return false;
	    }
	  		
  	} catch (PDOException $e) {
  		echo "ERROR" . $e->getMessage();
  	}
  }

  public function novo_user($name, $email, $password, $type){
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


  

}
