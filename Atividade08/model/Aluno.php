<?php

namespace Model;

use PDO;
use Model\Database;

class Aluno {

  protected $db = null;

  public function __construct() {
    $this->db = Database::getInstance()->getDB();
  }

  public function all() {
    $sql = "SELECT * FROM alunos ORDER BY nome";
    return $this->db->query($sql);
  }

   public function create($nome, $mail, $rua, $numero, $bairro, $cidade_id, $cep){
    try {
      $sql = "INSERT INTO alunos (nome, mail, rua, numero, bairro, cidade_id, cep)
      VALUES (:nome, :mail, :rua, :numero, :bairro, :cidade_id, :cep)";

      $result = $this->db->prepare($sql);
      $result->bindParam(':nome', $nome, PDO::PARAM_STR);
      $result->bindParam(':mail', $mail, PDO::PARAM_STR);
      $result->bindParam(':rua', $rua, PDO::PARAM_STR);
      $result->bindParam(':numero', $numero, PDO::PARAM_INT);
      $result->bindParam(':bairro', $bairro, PDO::PARAM_STR);
      $result->bindParam(':cidade_id', $cidade_id, PDO::PARAM_INT);
      $result->bindParam(':cep', $cep, PDO::PARAM_INT);
      return $result->execute();
    } catch (PDOException $e) {
      echo "ERROR" . $e->getMessage();
    }
  }

  public function select($nome){
    try {
      $sql = "SELECT * FROM alunos WHERE nome=:nome";

      $result = $this->db->prepare($sql);
      $result->bindParam(':nome', $nome, PDO::PARAM_STR);
      $result->execute();

      return $result->fetch(PDO::FETCH_ASSOC);

    } catch (PDOException $e) {
      echo "ERROR" . $e->getMessage();
    }

  }






}
