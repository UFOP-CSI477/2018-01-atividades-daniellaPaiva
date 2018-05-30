<?php

namespace Controller;

use Model\User;

class UsersController {

  public function create(){
  	// Invocar a View
    include './view/users/login.php';
  }


  public function login($request) {
    // Recuperando dados do form
    $email = trim(strip_tags($request['email']));
    $password = trim(strip_tags($request['password']));

	// Acesso ao Modelo
    $user = new User();
    $validacao = $user->validaDados($email,$password);

    if($validacao && isset($_SESSION['type'])){
      UsersController::nivel_acesso();
    } else{
    	//Usuario ou senha incorretos -> volta para tela de login
      echo "<script>alert('Usuário/senha incorreto');</script>";
    	include './view/users/login.php';
    }
  }

  public function nivel_acesso(){
    session_start();
    $nivel_adm = 1;
    $nivel_opr = 2;
    $nivel_pts = 3;

    if(isset($_SESSION['type'])){
      // Verifica o nível de acesso para chamar a view
      if($_SESSION['type'] == $nivel_adm){
        header('Location:./view/admin/home.php');
      }

      if($_SESSION['type'] == $nivel_opr){
        header('Location:./view/oper/home.php');
      }

      if($_SESSION['type'] == $nivel_pts){
        header('Location:./router.php?op=6');
      }
    }else{
      session_destroy();
      header("Location:./index.php");
    }
  }

  public function novo_cadastro(){
  	//router.php?op=4
  	include './view/users/cadastro.php';
  }

  public function cadastrar($request){
  	//router.php?op=5
    
  	// Recuperando dados do form
  	$name = trim(strip_tags($request['name']));
    $email = trim(strip_tags($request['email']));
    $password = trim(strip_tags($request['password']));

	// Acesso ao Modelo
    $user = new User();

    //Verifica se usuario já existe no bd
    $validacao = $user->validaDados($email,$password);
    if($validacao){
          echo "<script>alert('Usuário já existe. Pode logar :)');</script>";
          header('./view/users/login.php');
    } else{

     $cadastro = $user->cadastroPaciente($name,$email,$password);

     if($cadastro){
       $validacao = $user->validaDados($email,$password);
       UsersController::nivel_acesso();
     } else{
       echo "<script>alert('Falha ao cadastrar. Tente novamente!');</script>";
       include './view/users/cadastro.php';
     }
  }	
}


}