<?php

// Includes - framework
include '../../model/Database.php';
include '../../model/Admin.php';
include '../../model/Procedure.php';
include '../../model/Test.php';
include '../../model/User.php';
include '../../controller/AdminsController.php';
include '../../controller/ProceduresController.php';
include '../../controller/TestsController.php';
include '../../controller/UsersController.php';

// Tratamento das rotas
use Controller\AdminsController;
use Controller\ProceduresController;
use Controller\TestsController;
use Controller\UsersController;

$op = $_GET['op'];

// Definição das rotas
 if ( $op == 1 ) {
  //Sessão Admin - home
  $adminController = new AdminsController;
  $adminController->home();
} else if ( $op == 2 ) {
  //Sessão Admin - CRUD Procedures
  $adminController = new AdminsController;
  $adminController->procedures();
} else if ( $op == 3 ) {
  //Sessão Admin - CRUD Tests
  $adminController = new AdminsController;
  $adminController->tests();
} else if ( $op == 4 ) {
  //Sessão Admin - CRUD Usuários
  $adminController = new AdminsController;
  $adminController->users();
} else if ( $op == 5 ) {
  //Sessão Admin - Criar Procedures
  $procController = new ProceduresController;
  $procController->criar();
} else if ( $op == 6 ) {
  //Sessão Admin - Salvar Procedures
  $procController = new ProceduresController;
  $procController->salvar_novo($_POST);
} else if ( $op == 7 ) {
  //Sessão Admin - Criar novo usuário
  $adminController = new AdminsController;
  $adminController->novo_user();
} else if ( $op == 8 ) {
  //Sessão Admin - Salvar novo usuário
  $adminController = new AdminsController;
  $adminController->salvar_user($_POST);
}

