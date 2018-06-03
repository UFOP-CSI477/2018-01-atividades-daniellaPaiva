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
    include './view/cidades/content_list.php';
  }

  // Exibir o formulario para insercao da cidade
  public function create() {

    // Carregar os dados dos Estados
    $estados = new Estado;
    $lista = $estados->all();

    // Exibir a view
    include './view/cidades/content_create.php';
  }

  public function store($request) {
    session_start();
    $nome = $request['nome'];
    $estado_id = $request['estado_id'];

    $lista = new Cidade();
    $verifica = $lista->select($nome);

    if(!$verifica){
      $cidade = new Cidade();
      $cidade->setNome($nome);
      $cidade->setEstadoId($estado_id);
      $cidade->save();

      $_SESSION['mensagem'] = "Cidade inserida com sucesso!";
    } else{
      $_SESSION['mensagem'] = "Registro já existe!";
    }

    $this->redir();
  }

  private function redir() {
    header("Location: ./router.php?op=7");
    exit();
  }






}
