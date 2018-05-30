<?php

namespace Controller;

use Model\Procedure;

class ProceduresController {


  public function criar(){
  	// Invocar a View
    include '../procedures/novo.php';
  }

  public function salvar_novo($request){
  	// Recuperando dados do form
  	$user_id =  $request['user_id'];
    $name = $request['name'];
    $price = $request['price'];

    //Acesso ao modelo
    $procedure = new Procedure();
    $salvar = $procedure->novo($user_id, $name, $price);

    if($salvar){
    	header('Location:../admin/router.php?op=2');
    } else{
    	echo "Erro ao salvar";
    }

  }

  public function listar() {

    // Acesso ao Modelo
    $procedure = new Procedure();

    // Manipular dados
    $lista = $procedure->all();

    return $lista;
    // Invocar a View
    //include './view/procedures/lista.php';

  }

  public function listar_home() {

    // Acesso ao Modelo
    $procedure = new Procedure();

    // Manipular dados
    $lista = $procedure->all();


    // Invocar a View
    include './index.php';

  }

}
