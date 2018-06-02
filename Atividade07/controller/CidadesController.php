<?php

namespace Controller;

use Model\Cidade;
use Model\Estado;

class CidadesController {

  public function listar() {
    // Acesso ao Modelo
    $cidade = new Cidade;

    // Manipular dados
    $lista = $cidade->all();

    // Invocar a View
    include './view/cidades/content.php';
  }

}
