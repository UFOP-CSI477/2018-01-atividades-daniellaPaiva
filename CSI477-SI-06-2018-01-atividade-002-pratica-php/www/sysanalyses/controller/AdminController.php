<?php

namespace Controller;

use Model\Admin;
use Model\User;
use Model\Test;
use Model\Procedure;


class AdminController {

	public function home(){
		session_start();
		 //Acesso ao modelo
		$proc = new Procedure();

    //Tabela de procedimentos
		$lista = $proc->all();


  	// Invocar a View
		include './view/admin/home.php';
	}

	public function users(){
		session_start();
    //Acesso ao modelo
		$user = new User();

    //Tabela de procedimentos
		$lista = $user->all();

  	// Invocar a View
		include './view/admin/list_user.php';
	}

	public function create_user(){
		session_start();
		include './view/admin/create_user.php';
	}

	public function save_user($request){
		// Recuperando dados do form
		$name = $request['name'];
		$email = $request['email'];
		$password = $request['password'];
		$type = $request['type'];

		//Acesso ao Model
		$proc = new User();
		$result = $proc->create($name, $email, $password, $type);

		if($result){
			echo "<script>alert('Usuário criado com sucesso!');</script>";
			header("refresh:0; url=./router_admin.php?op=2");
		}else{
			echo "<script>alert('Ocorreu um erro!');</script>";
			header("refresh:0; url=./router_admin.php?op=2");
		}
	}

	public function edit_user($lista, $id){
		$user = new User();
		$result = $user->editar($id);

		//Invocar a view
		include './view/admin/edit_user.php';
	}

	public function update_user($request){
		//Acesso ao Model
		$user = new User();
		$result = $user->update($request);

		if($result){
			echo "<script>alert('Usuário atualizado com sucesso!');</script>";
			header("refresh:0; url=./router_admin.php?op=2");
		}else{
			echo "<script>alert('Ocorreu um erro!');</script>";
			header("refresh:0; url=./router_admin.php?op=2");
		}
	}

	public function delete_user($id){
		//Verificar se existe exame marcados pelo usuário
		$test = new Test();
		$verifica = $test->verifica_delete_user($id);

		if(!$verifica){
			$user = new User();
			$result = $user->delete($id);

			if($result){
				echo "<script>alert('Usuário deletado com sucesso!');</script>";
				header("Location: ./router_admin.php?op=2");
			} else{
				echo "<script>alert('Ocorreu um erro!');</script>";
				header("refresh:0; url=./router_admin.php?op=2");
			}

		} else{
			echo "<script>alert('Usuário não pode ser deletado!');</script>";
			header("refresh:0; url=./router_admin.php?op=2");
		}
	}

	public function create_procedure(){
		session_start();
		include './view/admin/create_procedure.php';
	}

	public function save_procedure($request){
		// Recuperando dados do form
		$name = $request['name'];
		$price = $request['price'];

		//Acesso ao Model

		//Verifica se procedimento com mesmo nome existe
		$proc = new Procedure();
		$consulta = $proc->verifica($name);

		if($consulta == 0){
			$result = $proc->create($name, $price);
			if($result){
				echo "<script>alert('Procedimento salvo com sucesso!');</script>";
				header("refresh:0; url=./router_admin.php?op=1");
			}else{
				echo "<script>alert('Ocorreu um erro!');</script>";
				header("refresh:0; url=./router_admin.php?op=1");
			}
		} else {
			echo "<script>alert('Procedimento já existe!');</script>";
			header("refresh:0; url=./router_admin.php?op=1");
		}
	}

	public function select_procedure($id){
		//Acesso ao modelo
		$proc = new Procedure();

		$lista = $proc->all();
		$result = $proc->select($id);

		include './view/admin/edit_procedure.php';
	}

	public function update_procedure($request){
		//Acesso ao Model
		$proc = new Procedure();
		$result = $proc->update($request);

		if($result){
			echo "<script>alert('Procedimento atualizado com sucesso!');</script>";
			header("refresh:0; url=./router_admin.php?op=1");
		}else{
			echo "<script>alert('Ocorreu um erro!');</script>";
			header("refresh:0; url=./router_admin.php?op=1");
		}
	}

	public function delete_procedure($id){
		//Verificar se existe exame marcados
		$test = new Test();
		$result = $test->verifica_delete_procedure($id);

		if(!$result){
			$proc = new Procedure();
			$result = $proc->delete($id);
			
			if($result){
				echo "<script>alert('Procedimento deletado com sucesso!');</script>";
				header("Location: ./router_admin.php?op=1");
			} else{
				echo "<script>alert('Ocorreu um erro!');</script>";
				header("refresh:0; url=./router_admin.php?op=1");
			}

		} else{
			echo "<script>alert('Procedimento não pode ser deletado!');</script>";
			header("refresh:0; url=./router_admin.php?op=1");
		}
		
	}

	public function tests(){
		session_start();
    //Acesso ao modelo
		$test = new Test();
		$lista = $test->all();

  	// Invocar a View
		include './view/admin/list_tests.php';
		
	}

	public function tests_patients(){
		session_start();
   		//Acesso ao modelo
		$patients = new User();

		//Lista com todos os pacientes -> type =3
		$lista = $patients->all_patients();


  		// Invocar a View
		//include './view/admin/tests_patients.php';

		foreach ($lista as $linha) {
			var_dump($linha);
		}
		
	}

	public function tests_procedures(){
		session_start();
    //Acesso ao modelo
		$test = new Test();
		$lista = $test->all();

  	// Invocar a View
		include './view/admin/tests_procedures.php';
		
	}
}