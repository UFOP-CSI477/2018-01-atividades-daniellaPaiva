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
			header("Location: ./router_admin.php?op=2");
		}else{
			echo "ERRO";
		}
	}

	public function delete_user($id){
		$user = new User();
		$result = $user->delete($id);

		header("Location: ./router_admin.php?op=2");
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
			header("Location: ./router_admin.php?op=1");
		}else{
			echo "ERRO";
		}
	}

	public function delete_procedure($id){
		$proc = new Procedure();
		$result = $proc->delete($id);

		if($result){
			header("Location: ./router_admin.php?op=1");
		}else{
			echo "ERRO";
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

	public function relatorios(){
		echo "CRUD RELATORIOS";
	}
}