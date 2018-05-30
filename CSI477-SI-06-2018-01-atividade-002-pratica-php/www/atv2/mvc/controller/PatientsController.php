<?php

namespace Controller;

use Model\Patient;

class PatientsController {

	public function home() {

    // Acesso ao Modelo
		$patient = new Patient();

    // Manipular dados
		$lista = $patient->all();
    // Invocar a View
		include './view/patients/home.php';
	}

	public function novo_exame(){
		// Invocar a View
		include './view/patients/novo_exame.php';
	}

	public function salvar_exame($request){
		// Recuperando dados do form
		$procedure = $request['procedure'];
		$date = $request['date'];

		//Acesso ao Model
		$exame = new Patient();
		$result = $exame->salvar($procedure, $date);

		if($result){
			header("Location: ./router.php?op=9");
		}else{
			echo "Não inserido";
		}
		
	}

	public function deletar_exame(){

		//Acesso ao Model
		//$exame = new Patient();
		//$result = $exame->sdeletar($linha);

		echo "aqui ";
		
	}

}