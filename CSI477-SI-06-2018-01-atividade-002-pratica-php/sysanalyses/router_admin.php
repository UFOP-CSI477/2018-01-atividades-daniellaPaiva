<?php

// Includes - framework
include './model/Database.php';
include './model/Procedure.php';
include './model/User.php';
include './model/Test.php';
include './controller/AdminController.php';
include './controller/UsersController.php';

// Tratamento das rotas
use Controller\AdminController;
use Controller\UsersController;

$op = $_GET['op'];

// Definição das rotas

	//Sair
if ( $op == 0 ) {
	session_start();
	session_unset();
	header("Location: ./index.php");
} 
	//Home
elseif ( $op == 1 ) {  
	$adminController = new AdminController;
	$adminController->home();
} 

//Users
elseif ( $op == 2 ) {  
	$adminController = new AdminController;
	$adminController->users();
} 

//Criar User
elseif ( $op == 12 ) {
	$adminController = new AdminController;
	$adminController->create_user();
}

//Salvar User
elseif ( $op == 13 ) {
	$adminController = new AdminController;
	$adminController->save_user($_POST);
}

//Editar User
elseif ( $op == 3 ) {  
	$id = $_GET['id'];

	$usersController = new UsersController;
	$lista = $usersController->list();

	$adminController = new AdminController;
	$adminController->edit_user($lista, $id);
} 

//Atualizar User
elseif ( $op == 4 ) {  
	$adminController = new AdminController;
	$adminController->update_user($_POST);
} 

//Excluir User
elseif ( $op == 5 ) { 
	$id = $_GET['id'];

	$adminController = new AdminController;
	$adminController->delete_user($id);
} 

//Criar Procedures
elseif ( $op == 10 ) {
	$adminController = new AdminController;
	$adminController->create_procedure();
}

//Salvar Procedures
elseif ( $op == 11 ) {
	$adminController = new AdminController;
	$adminController->save_procedure($_POST);
}

//Editar Procedures
elseif ( $op == 6 ) {
	$id = $_GET['id'];  

	$adminController = new AdminController;
	$adminController->select_procedure($id);
} 

//Atualizar Procedures
elseif ( $op == 7 ) {  
	$adminController = new AdminController;
	$adminController->update_procedure($_POST);
} 

//Deletar Procedures
elseif ( $op == 8 ) {  
	$id = $_GET['id'];

	$adminController = new AdminController;
	$adminController->delete_procedure($id);
} 

//Tests
elseif ( $op == 9 ) {  
	$adminController = new AdminController;
	$adminController->tests();
}