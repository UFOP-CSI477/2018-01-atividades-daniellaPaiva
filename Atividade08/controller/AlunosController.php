<?php

namespace Controller;

use PDO;
use Model\Aluno;

class AlunosController {

  public function listar() {

    // Acesso ao Modelo
    $aluno = new Aluno();

    // Manipular dados
    $lista = $aluno->all();


    // Invocar a View
    include './view/alunos/content_list.php';
  }

  // Exibir o formulario para insercao da aluno
  public function create($lista) {


    // Exibir a view
    include './view/alunos/content_create.php';
  }

  public function store($request) {
    session_start();
    $nome = $request['nome'];
    $mail = $request['mail'];
    $rua = $request['rua'];
    $numero = $request['numero'];
    $bairro = $request['bairro'];
    $cidade_id = $request['cidade_id'];
    $cep = $request['cep'];

    $aluno = new Aluno();
    $verifica = $aluno->select($nome);

    if(!$verifica){
      $result = $aluno->create($nome, $mail, $rua, $numero, $bairro, $cidade_id, $cep);
      $_SESSION['mensagem'] = "Aluno inserido com sucesso!";
    } else {
      $_SESSION['mensagem'] = "Registro já existe!";
    }

    $this->redir();
  }



  private function redir() {
    header("Location: ./router.php?op=4");
    exit();
  }

}
