<?php
namespace Model;
use Model\Database;
class User {
  protected $db = null;
  public function __construct() {
    $this->db = Database::getInstance()->getDB();
  }
  public function all() {
    $sql = "SELECT * FROM users ORDER BY name";
    return $this->db->query($sql);
  }

   public function validar($email, $senha) {
        $query = $this->db->prepare("SELECT * FROM `users` WHERE email = '$email' AND password = '$senha' LIMIT 1");
        $results = $query->execute();
        $numRows = $query->rowCount();
       if ($numRows == 0) {
            return null;
        } else {
            return $query->fetch();
        }
    }

    public function insert($nome, $email, $senha){ 
      $sql = "INSERT into users(name, email, password, type) VALUES('$nome', '$email', '$senha', 3)";
      if($this->db->query($sql)){
        return true;
      } else { 
        return false;
      }  
      
    }
}
