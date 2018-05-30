<?php

namespace Model;

use PDO;

class Database {

  protected $db = null;

  // Construtor da classe
  protected function __construct() {
  }

  // Singleton - instance - static
  public static function getInstance() {

    static $instance = null;

    if ($instance === null) {
      $instance = new static();
    }

    return $instance;

  }

  public function getDB() {

    if ($this->db === null) {
      try{
        $db = new PDO('mysql:host=localhost;dbname=analyses', 'sysanalyses', '123456');

        $db -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      }

      catch(PDOException $e){
        print "ERROR" . $e->getMessage();
      }
    }

    return $db;

  }





}
