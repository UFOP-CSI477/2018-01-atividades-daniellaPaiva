<?php

// Includes - framework
include './model/Database.php';
include './model/Operador.php';
include './model/Test.php';
include './model/Procedure.php';
include './controller/OpersController.php';

// Tratamento das rotas
use Controller\OpersController;

$op = $_GET['op'];

// Definição das rotas

	//Sair
if ( $op == 0 ) {
	session_start();
	session_unset();
	header("Location: ./index.php");
} 
	//Home - Listar exames
elseif ( $op == 1 ) {  
	$operController = new OpersController;
	$operController->home();
} 

//Procedimentos - Listar procedimentos
elseif ( $op == 2 ) {  
	$operController = new OpersController;
	$operController->procedures();
} 

//Procedimentos - Editar procedimento
elseif ( $op == 3 ) {  
	$id = $_GET['id'];

	$operController = new OpersController;
	$operController->edit_procedure($id);
} 

//Procedimentos - Atualizar procedimento
elseif ( $op == 4 ) {  
	$operController = new OpersController;
	$operController->update_procedure($_POST);
} 
 	

 	