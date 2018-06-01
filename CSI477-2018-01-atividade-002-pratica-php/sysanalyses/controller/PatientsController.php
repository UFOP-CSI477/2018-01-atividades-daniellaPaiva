<?php

namespace Controller;
use Model\Patient;
use Model\Test;
use Model\Procedure;

class PatientsController {

	public function home() {
		session_start();
		$user_id = $_SESSION['user'];
    // Acesso ao Modelo
		$tests = new Test();

    // Manipular dados
		$lista = $tests->user_tests($user_id);
		$tamanho = sizeof($lista);
		$valor = PatientsController::valor_exames($lista);
		
    // Invocar a View
		include './view/patient/home.php';

	}

	public function valor_exames($lista){
		$valor = 0;
		foreach( $lista as $linha ){
			$valor += $linha['price'];
		}
		return $valor;
	}

	public function novo_exame(){
		session_start();

		//Acesso ao modelo
		$proc = new Procedure();
		$lista = $proc->all();

		include './view/patient/create_test.php';
	}

	public function salvar_exame($request){
		// Recuperando dados do form
		$proc_list = $request['check_proc'];
		$date = $request['date'];

		//Acesso ao Model
		$exame = new Test();
		$result = $exame->create($proc_list, $date);

		if($result){
			echo "<script>alert('Exame marcado com sucesso!');</script>";
			header("refresh:0; url=./router_patient.php?op=1");
		}else{
			echo "<script>alert('Ocorreu um erro!');</script>";
			header("refresh:0; url=./router_patient.php?op=1");
		}		
	}

	public function editar_exame($id){
		//Acesso ao modelo
		$proc = new Procedure();
		$lista = $proc->all();

		$exame = new Test();
		$result = $exame->select($id);

		//Invocar a view
		include './view/patient/edit_test.php';
	}

	public function atualizar_exame($request){
		//Acesso ao Model
		$exame = new Test();
		$result = $exame->update($request);

		if($result){
			echo "<script>alert('Exame atualizado com sucesso!');</script>";
			header("refresh:0; url=./router_patient.php?op=1");
		}else{
			echo "<script>alert('Ocorreu um erro!');</script>";
			header("refresh:0; url=./router_patient.php?op=1");
		}
	}

	public function excluir_exame($id){
		$exame = new Test();
		$result = $exame->delete($id);

		if($result){
			echo "<script>alert('Exame excluido com sucesso!');</script>";
			header("refresh:0; url=./router_patient.php?op=1");
		}else{
			echo "<script>alert('Ocorreu um erro!');</script>";
			header("refresh:0; url=./router_patient.php?op=1");
		}
	}

	public function procedures(){
		session_start();
		//Acesso ao modelo
		$proc = new Procedure();
		$lista = $proc->all();

		include './view/patient/procedures.php';
	}

}