<?php

// Includes - framework
include './model/Database.php';
include './model/Procedure.php';
include './model/Test.php';
include './controller/PatientsController.php';

// Tratamento das rotas
use Controller\PatientsController;

$op = $_GET['op'];

// Definição das rotas

	//Sair
if ( $op == 0 ) {
	session_start();
	session_unset();
	header("Location: ./index.php");
} 
	//Home - Meus exames
elseif ( $op == 1 ) {  
	$patientController = new PatientsController;
	$patientController->home();
} 
 	//Marcar exame
elseif ( $op == 2 ) {
	$testController = new PatientsController;
	$testController->novo_exame();
} 

//Salvar exame
elseif ( $op == 3 ) {
	$testController = new PatientsController;
	$testController->salvar_exame($_POST);
} 

//Editar exame
elseif ( $op == 4 ) {
	$id = $_GET['id'];

	$testController = new PatientsController;
	$testController->editar_exame($id);
} 

//Atualizar exame
elseif ( $op == 5 ) {
	$testController = new PatientsController;
	$result = $testController->atualizar_exame($_POST);
} 

//Excluir exame
elseif ( $op == 6 ) {
	$id = $_GET['id'];

	$testController = new PatientsController;
	$testController->excluir_exame($id);
} 
	//Procedimentos
elseif ( $op == 7 ) {
	$procController = new PatientsController;
	$procController->procedures();
} 



