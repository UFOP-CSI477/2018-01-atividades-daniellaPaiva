<?php

// Includes - framework
include './model/Database.php';
include './model/User.php';
include './model/Patient.php';
include './model/Procedure.php';
include './controller/UsersController.php';
include './controller/PatientsController.php';

// Tratamento das rotas
use Controller\UsersController;
use Controller\PatientsController;

$op = $_GET['op'];

// Definição das rotas - Área de Acesso Geral

// Área de Login - /geral/header/Área do paciente
//Invoca view de login
if ( $op == 1 ) {
  $viewloginController = new UsersController;
  $viewloginController->create();
}

//Ação enviar - formulário de login [email, password]
 elseif ( $op == 2 ) {
  $loginController = new UsersController;
  $loginController->login($_POST);
} 

// Área de cadastro - novo paciente
// Invoca a view de cadastro
 elseif ( $op == 3 ) {
  $viewCadController = new UsersController;
  $viewCadController->novo_usuario();
}

//Ação enviar - formulário de login cadastro [name, email, password]
 elseif ( $op == 4 ) {
  $cadastrarController = new UsersController;
  $cadastrarController->cadastrar($_POST);
} 