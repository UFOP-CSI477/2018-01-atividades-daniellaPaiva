<?php
namespace Controller;
use Model\User;
class UsersController{
	public function lista(){

	}

	public function validar($email, $senha){
		$users = new User;
        $op = $users->validar($email, $senha);
        if ($op == null || !$op) {
            echo"<script type='text/javascript'>alert('Login e/ou senha incorretos');
            </script>";
      	 } else {
            session_start();
            $_SESSION['type'] = $op['type'];
            $_SESSION['email'] = $op['email'];
            $_SESSION['name'] = $op['name'];
            $_SESSION['id'] = $op['id'];
            header("Location: ./index.php");
        }
    }

    public function insert($nome, $email, $senha){ 
        $users = new User;
        $result = $users->insert($nome, $email, $senha);
        if ($result == false) {
            echo"<script type='text/javascript'>alert('Usuário não cadastrado!');
             location.href='./router.php?op=2';
            </script>";
        } else {
            echo"<script type='text/javascript'>alert('Usuário cadastrado com sucesso!');
            </script>";
        }
    }


}
