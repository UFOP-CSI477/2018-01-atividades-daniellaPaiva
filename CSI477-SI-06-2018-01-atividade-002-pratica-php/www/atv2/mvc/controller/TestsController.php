<?php

namespace Controller;

use Model\Test;

class TestsController {

  public function home() {
  	// Invocar a View
    include './view/tests/crud_admin.php';
  }	

  public function listar() {

    // Acesso ao Modelo
    $test = new Test();

    // Manipular dados
    $lista = $test->all();


    // Invocar a View
    include './view/tests/lista.php';



  }

}
