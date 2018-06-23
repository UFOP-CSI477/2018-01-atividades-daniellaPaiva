<?php

// Includes - framework
include './model/Database.php';
include './model/Aluno.php';
include './model/Cidade.php';
include './model/Estado.php';
include './controller/AlunosController.php';
include './controller/CidadesController.php';

// Tratamento das rotas
use Controller\AlunosController;
use Controller\CidadesController;

$op = $_GET['op'];

// Definição das rotas
if ( $op == 1 ) {
  header("Location: index.php");
} else if ( $op == 2 ) {
  $alunoController = new AlunosController;
  $alunoController->listar();
} else if ( $op == 3 ) {
  $cidadeController = new CidadesController;
  $cidadeController->listar();
}
