<?php

namespace Controller;

use Model\Admin;
use Model\User;
use Model\Procedure;
use Model\Test;

class AdminsController {

  public function home(){
  	// Invocar a View
    include './home.php';
  }

  public function procedures(){
  	//Acesso ao modelo
    $procedure = new Procedure();

    //Tabela de procedimentos
    $lista = $procedure->all();

    // Invocar a View
    include './crud_procedures.php';
  }

  public function tests(){
    //Acesso ao modelo
    $test = new Test();

    //Tabela de procedimentos
    $lista = $test->all();
  	// Invocar a View
    include './crud_tests.php';
  }

  public function users(){
    //Acesso ao modelo
    $user = new User();

    //Tabela de procedimentos
    $lista = $user->all();

  	// Invocar a View
    include './crud_users.php';
  }

  public function novo_user(){
    // Invocar a View
    include '../users/novo.php';
  }

  public function salvar_user($request){
    // Recuperando dados do form
    $name = $request['name'];
    $email = $request['email'];
    $password =  $request['password'];
    $type =  $request['type'];

    //Acesso ao modelo
    $user = new Admin();

    //Verifica se uruário já existe
    $existe = $user->verifica($email);
    
    if(!$existe){  
      //Salva novo usuário
      $salvar = $user->novo_user($name, $email, $password, $type);

      if($salvar){
        header('Location:../admin/router.php?op=4');
      } else{
        echo "Erro ao salvar";
      }
    } else {
      echo "Usuário já cadastrado!";
    }


  }

}