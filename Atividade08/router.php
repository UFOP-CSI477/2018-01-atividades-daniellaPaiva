<?php

// Includes - framework
include './model/Database.php';
include './model/Aluno.php';
include './model/Cidade.php';
include './model/Estado.php';
include './controller/AlunosController.php';
include './controller/CidadesController.php';

// Tratamento das rotas
use Model\Cidade;
use Controller\AlunosController;
use Controller\CidadesController;

$op = $_GET['op'];

// Definição das rotas
if ( $op == 1 ) {
  header("Location: index.php");
} else if ( $op == 2 ) {
  $cidadeController = new Cidade();
  $lista = $cidadeController->all();

  $alunoController = new AlunosController;
  $alunoController->create($lista);
} else if ( $op == 3 ) {
  $alunoController = new AlunosController;
  $alunoController->store($_POST);
} else if ( $op == 4 ) {
  $alunoController = new AlunosController;
  $alunoController->listar(); 
} else if ( $op == 5 ) {
  $cidadeController = new CidadesController;
  $cidadeController->create();
} else if ( $op == 6 ) {
  //var_dump($_POST);
  $cidadeController = new CidadesController;
  $cidadeController->store($_POST);
} else if ( $op == 7 ) {
  $cidadeController = new CidadesController;
  $cidadeController->listar();
}
