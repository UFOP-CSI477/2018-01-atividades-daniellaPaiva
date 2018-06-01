<?php

namespace Controller;

use Model\User;

class UsersController {

  public function list(){
    //Acesso ao modelo
    $user = new User();
    $lista = $user->all(); 
    //Tabela de procedimentos
    return $lista;
  }

  // Invocar a View de login administrador - router.php?op=5
  public function login_admin(){

    include './view/geral/login.php';
  }

  // Invocar a View de login - router.php?op=1
  // index/header
  public function create(){

    include './view/geral/login.php';
  }

  //Ação enviar - formulário de login [email, password]
  public function login($request) {
    session_start();

    // Recuperando dados do form
    if(isset($request['email']) && isset($request['password']) ){
      $email = trim(strip_tags($request['email']));
      $password = trim(strip_tags($request['password']));

      // Acesso ao Modelo
      $user = new User();
      // Verifica se usuário existe no baco de dados
      // Cria a sessão [user, type]
      $validacao = $user->validaDados($email,$password);

      // $_SESSION['user'] e $_SESSION['type']
      if($validacao && isset($_SESSION['type'])){
        UsersController::nivel_acesso();
      } else{
        //Usuario ou senha incorretos -> volta para tela de login
        echo "<script>alert('Usuário/senha incorreto');</script>";
        include './view/geral/login.php';
      }
    } else{
      if(isset($_SESSION['user'])) {
        unset($_SESSION['user']);
        unset($_SESSION['type']);
      }
      include './view/geral/login.php';
    }

  }

  // Verifica $_SESSION['type'] e redireciona para a home referente ao tipo do usuário
  public function nivel_acesso(){
    $nivel_adm = 1;
    $nivel_opr = 2;
    $nivel_pts = 3;

    if(isset($_SESSION['user'])){
      // Verifica o nível de acesso para chamar a view
      if($_SESSION['type'] == $nivel_pts){
        header("Location:./router_patient.php?op=1");
      }
      
      if($_SESSION['type'] == $nivel_adm){
        header("Location:./router_admin.php?op=1");
      }

      if($_SESSION['type'] == $nivel_opr){
        header('Location:./router_oper.php?op=1');
      }

    }else{
      session_destroy();
      header("Location:./index.php");
    }
  }

  public function novo_usuario(){
    //router.php?op=3
    include './view/geral/cadastro.php';
  }

  public function cadastrar($request){
    //router.php?op=4

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
include './view/geral/login.php';
} else{

 $cadastro = $user->cadastroPaciente($name,$email,$password);

 if($cadastro){
   $validacao = $user->validaDados($email,$password);
   UsersController::nivel_acesso();
 } else{
   echo "<script>alert('Falha ao cadastrar. Tente novamente!');</script>";
   include './view/geral/cadastro.php';
 }
} 
}

}