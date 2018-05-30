
<?php
// Includes - framework
include './model/Database.php';
include './model/Procedure.php';
include './controller/ProceduresController.php';
include './controller/UsersController.php';
include './controller/TestsController.php';
include './model/Test.php';
include './model/User.php';
// Tratamento das rotas
use Controller\ProceduresController;
use Controller\UsersController;
use Controller\TestsController;
use Model\Database;
 if(!isset ($_SESSION) == true){
    session_start();
} 
 
$op = $_GET['op'];
// Definição das rotas
if ($op == 1){ //envia para a area de login
  include './view/login/login.php';
}else if ($op == 2){ //envia para a area de cadastro
	include './view/registro/registroUser.php';
}
else if ( $op == 3 ) { //exibir todos os procedimentos
  $procedureController = new ProceduresController;
  $procedureController->listar();
}else if ($op == 4){ //validar login (fazer login propriamente dito)
	$email = $_POST["username"];
    $senha = $_POST["senha"];
    $usersController = new UsersController;
    $usersController->validar($email, $senha);
    include './view/login/login.php';
} else if ($op == 5){ //cadastrar exame
	$date = $_POST["data"];
    $procedure = $_POST["procedureId"];
    $testsController = new TestsController;
    $testsController->insert($date, $procedure);
}else if ($op == 6){ //cadastrar usuario
	$nome = $_POST["name"];
    $email = $_POST["email"];
    $senha = $_POST["senha"];
    $usersController = new UsersController;
    $usersController->insert($nome, $email, $senha);
    include './view/login/login.php';
}else if ($op == 7){ //acessar area paciente - cadastro de exames - com controle de permissao
	if(!isset ($_SESSION['email']) == true){
    unset($_SESSION);
    	echo"<script type='text/javascript'>alert('Você precisa estar logado!');
        location.href = 'router.php?op=1';
        </script>";
    }else{
    	if($_SESSION['type'] != 3){ 
    		echo"<script type='text/javascript'>alert('Você não tem permissão para acessar essa página!');
        	location.href ='index.php';
        	</script>";
    	}else{ 
    		include './view/registro/registroTests.php';
    	}
   }
}else if ($op == 8){ //acessar area geral com conrole de permissao
	if(!isset ($_SESSION['email']) == true){
    unset($_SESSION);
    	echo"<script type='text/javascript'>alert('Você precisa estar logado!');
        location.href = 'router.php?op=1';
        </script>";
    }else{
    	if($_SESSION['type'] != 2){ 
    		echo"<script type='text/javascript'>alert('Você não tem permissão para acessar essa página!');
        	location.href ='index.php';
        	</script>";
   		}else {
   			include './view/procedures/listao.php';
   		}
   	}
}else if ($op == 9){ //acessar area admin com controle de permissao
	if(!isset ($_SESSION['email']) == true){
    unset($_SESSION);
    	echo"<script type='text/javascript'>alert('Você precisa estar logado!');
        location.href = 'router.php?op=1';
        </script>";
    }else{
    	if($_SESSION['type'] != 1){ 
    		echo"<script type='text/javascript'>alert('Você não tem permissão para acessar essa página!');
        	location.href ='index.php';
        	</script>";
    	}else{ 
    		include './view/registro/registroprocedures.php';
    	}
   }
}else if ($op == 10){ //logout
	if(isset ($_SESSION['email']) == true){
    	session_destroy();
	}
   header("Location: ./index.php");
}else if ($op == 11){ //acessar area paciente - historico de exames - com controle de permissao
	if(!isset ($_SESSION['email']) == true){
    unset($_SESSION);
    	echo"<script type='text/javascript'>alert('Você precisa estar logado!');
        location.href = 'router.php?op=1';
        </script>";
    }else{
    	if($_SESSION['type'] != 3){ 
    		echo"<script type='text/javascript'>alert('Você não tem permissão para acessar essa página!');
        	location.href ='index.php';
        	</script>";
    	}else{ 
    		include './view/tests/historicoExames.php';
    	}
   }
}else if ($op == 12){ //remover exame
	if(!isset ($_SESSION['email']) == true){
    unset($_SESSION);
    	echo"<script type='text/javascript'>alert('Você precisa estar logado!');
        location.href = 'router.php?op=1';
        </script>";
    }else{
    	$id = $_POST['idTestRemove'];
	    $testsController = new TestsController;
	    $testsController->remove($id);
	}
}else if ($op == 13){ //editar exame
	if(!isset ($_SESSION['email']) == true){
    unset($_SESSION);
    	echo"<script type='text/javascript'>alert('Você precisa estar logado!');
        location.href = 'router.php?op=1';
        </script>";
    }else{
    	$id = $_POST['idTest'];
    	$procedure = $_POST['procedureId'];
    	$date = $_POST['data'];
    	$testsController = new TestsController;
    	$testsController->update($id, $procedure, $date);
	}
}else if ($op == 14){ //editar procedure
	if(!isset ($_SESSION['email']) == true){
    unset($_SESSION);
    	echo"<script type='text/javascript'>alert('Você precisa estar logado!');
        location.href = 'router.php?op=1';
        </script>";
    }else{
    	$id = $_POST['idProc'];
    	$price = $_POST['preco'];
    	$procedureController = new ProceduresController;
    	$procedureController->updateOp($id, $price);
	}
}else if ($op == 15){ //inserir procedure
	if(!isset ($_SESSION['email']) == true){
    unset($_SESSION);
    	echo"<script type='text/javascript'>alert('Você precisa estar logado!');
        location.href = 'router.php?op=1';
        </script>";
    }else{
    	if($_SESSION['type'] == 1){
    		$name = $_POST['name'];
	    	$price = $_POST['preco'];
	    	$procedureController = new ProceduresController;
	    	$procedureController->insert($name, $price);
    	}else{ 
    		echo"<script type='text/javascript'>alert('Você não tem permissão para acessar essa página!');
        	location.href ='index.php';
        	</script>";
    	}
	}
}else if ($op == 16){ //editar procedure area admin com controle de permissao
	if(!isset ($_SESSION['email']) == true){
    unset($_SESSION);
    	echo"<script type='text/javascript'>alert('Você precisa estar logado!');
        location.href = 'router.php?op=1';
        </script>";
    }else{
    	if($_SESSION['type'] != 1){ 
    		echo"<script type='text/javascript'>alert('Você não tem permissão para acessar essa página!');
        	location.href ='index.php';
        	</script>";
    	}else{ 
    		include './view/procedures/listaadmin.php';
    	}
   }
}else if ($op == 17){ //editar procedure admin
	if(!isset ($_SESSION['email']) == true){
    unset($_SESSION);
    	echo"<script type='text/javascript'>alert('Você precisa estar logado!');
        location.href = 'router.php?op=1';
        </script>";
    }else{
    	if($_SESSION['type'] == 1){
    		$id = $_POST['idProc'];
    		$name = $_POST['name'];
	    	$price = $_POST['preco'];
	    	$procedureController = new ProceduresController;
	    	$procedureController->update($id, $name, $price);
    	}else{ 
    		echo"<script type='text/javascript'>alert('Você não tem permissão para acessar essa página!');
        	location.href ='index.php';
        	</script>";
    	}
	}
}else if ($op == 18){ //deletar procedure admin
	if(!isset ($_SESSION['email']) == true){
    unset($_SESSION);
    	echo"<script type='text/javascript'>alert('Você precisa estar logado!');
        location.href = 'router.php?op=1';
        </script>";
    }else{
    	if($_SESSION['type'] == 1){
    		$id = $_POST['idProc'];
	    	$procedureController = new ProceduresController;
	    	$procedureController->delete($id);
    	}else{ 
    		echo"<script type='text/javascript'>alert('Você não tem permissão para acessar essa página!');
        	location.href ='index.php';
        	</script>";
    	}
	}
}else if ($op == 19){ //relatórios admin
	if(!isset ($_SESSION['email']) == true){
    unset($_SESSION);
    	echo"<script type='text/javascript'>alert('Você precisa estar logado!');
        location.href = 'router.php?op=1';
        </script>";
    }else{
    	if($_SESSION['type'] == 1){
    		include './view/relatorios/relatoriocliente.php';
    	}else{ 
    		echo"<script type='text/javascript'>alert('Você não tem permissão para acessar essa página!');
        	location.href ='index.php';
        	</script>";
    	}
	}
}else if ($op == 20){ //relatórios admin
	if(!isset ($_SESSION['email']) == true){
    unset($_SESSION);
    	echo"<script type='text/javascript'>alert('Você precisa estar logado!');
        location.href = 'router.php?op=1';
        </script>";
    }else{
    	if($_SESSION['type'] == 1){
    		include './view/relatorios/relatorioprocedimento.php';
    	}else{ 
    		echo"<script type='text/javascript'>alert('Você não tem permissão para acessar essa página!');
        	location.href ='index.php';
        	</script>";
    	}
	}
}