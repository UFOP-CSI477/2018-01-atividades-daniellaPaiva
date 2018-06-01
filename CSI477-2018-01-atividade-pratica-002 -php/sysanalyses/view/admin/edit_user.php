<?php
	//Comprovar session...
$nivel = 1;
if(!isset($_SESSION['user']) || ($_SESSION['type'] != $nivel))
{
		//Tela de login
	header("Location: router.php?op=1");
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Sistema de Controle de Solicitações de Análises Laboratoriais</title>


	<?php require_once("./view/geral/head.php"); ?>

</head>
<body>

	<?php require_once("./view/admin/header.php"); ?>

	<div class="col-md-4"></div>
	<div class="col-md-4" align="center">
		<h1>Editar Usuário</h1>
		<form class="form-group row" action="router_admin.php?op=4" method="post">
			<input type="text" name="user_id" style="display:none;" value="<?php echo "".$result['id'] ?>">
			<input class="form-control" type="text" name="name" id="name" value="<?php echo "".$result['name'] ?>" /> <br>
			<input class="form-control" type="text" name="email" id="email" value="<?php echo "".$result['email'] ?>" /> <br>
			<input class="form-control" type="text" name="password" id="password" value="<?php echo "".$result['password'] ?>" /> <br>
			<input class="form-control" type="text" name="type" id="type" value="<?php echo "".$result['type'] ?>" /> <br>
			<input class="btn" type="submit" name="atualizar" value="Atualizar" />
		</form>
	</div>
	<?php	require_once("./view/geral/footer.php");?>    

</body>
</html>
