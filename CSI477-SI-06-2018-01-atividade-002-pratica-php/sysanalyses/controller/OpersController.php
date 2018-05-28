<?php

namespace Controller;

use Model\Operador;
use Model\Test;
use Model\Procedure;


class OpersController {

	//Lista exames
	public function home(){
		session_start();

		//Acesso ao modelo
		$test = new Test();
		$lista = $test->all();
  		
  		// Invocar a View
		include './view/operador/home.php';
	}

	//Lista procedimentos
	public function procedures(){
		session_start();

		//Acesso ao modelo
		$proc = new Procedure();
		$lista = $proc->all();

		include './view/operador/list_procedures.php';
	}

	//Seleciona e exibe procedimento
	public function select_procedure($id){
		$procedure = new Procedure();
		$result = $procedure->select($id);

		include './view/operador/edit_procedure.php';
	}

	//Atualiza procedimento
	public function update_procedure($request){
		$procedure = new Procedure();
		$result = $procedure->update($request);

		if($result){
			header("Location: ./router_oper.php?op=2");
		}else{
			echo "ERRO";
		}
	}

}