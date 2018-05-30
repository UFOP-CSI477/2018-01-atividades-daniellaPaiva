<?php

// Includes - framework
include './model/Database.php';
include './model/User.php';
include './model/Patient.php';
include './model/Procedure.php';
include './model/Test.php';
include './controller/UsersController.php';
include './controller/PatientsController.php';
include './controller/ProceduresController.php';
include './controller/TestsController.php';

// Tratamento das rotas
use Controller\UsersController;
use Controller\PatientsController;
use Controller\ProceduresController;
use Controller\TestsController;

$op = $_GET['op'];

// Definição das rotas - Acesso Geral
if ( $op == 1 ) {
	//Listar procedimentos - $_SESSION['usuario'] não existe
  $procController = new ProceduresController;
  $procController->listar();
}else if ( $op == 2 ) {
	//Invoca a view de Login
  $loginController = new UsersController;
  $loginController->create();
} else if ( $op == 3 ) {
  //Post - Entrar
  $loginController = new UsersController;
  $loginController->login($_POST);
} else if ( $op == 4 ) {
  //Invoca a view de cadastro
  $cadController = new UsersController;
  $cadController->novo_cadastro();
} else if ( $op == 5 ) {
  //POST - Cadastrar
  $cadController = new UsersController;
  $cadController->cadastrar($_POST);
} else if ( $op == 6 ) {
  //Sessão Paciente - Home - Meus exames
  $patController = new PatientsController;
  $patController->home();
} else if ( $op == 7 ) {
  //Sessão Paciente - Invoca view novo exame
  $patController = new PatientsController;
  $patController->novo_exame();
} else if ( $op == 8 ) {
  //Sessão Paciente - Salvar exame
  $patController = new PatientsController;
  $patController->salvar_exame($_POST);
} else if ( $op == 9 ) {
  //Invoca a view/home.php da sessão atual
  $loginController = new UsersController;
  $loginController->nivel_acesso();
} else if ( $op == 10 ) {
  //Sessão Paciente - Deletar exame
  $patController = new PatientsController;
  $patController->deletar_exame();
} 

