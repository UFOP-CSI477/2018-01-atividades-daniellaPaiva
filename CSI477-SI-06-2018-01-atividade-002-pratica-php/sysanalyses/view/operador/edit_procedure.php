<?php
	//Comprovar session...
$nivel = 2;
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

	<?php require_once("./view/operador/header.php"); ?>

	<div class="col-md-4"></div>
	<div class="col-md-4" align="center">
		<h1>Editar procedimento</h1>
		<form class="form-group row" action="router_oper.php?op=4" method="post">
			<input class="form-control" type="text" name="procedure_id" value="<?php echo "".$result['id'] ?>" readonly>
			<br>
			<input class="form-control" type="text" name="name" id="name" value="<?php echo "".$result['name'] ?>" readonly/>
			<br>
			<input class="form-control" type="text" name="price" id="price" value="<?php echo "".$result['price'] ?>" /> <br>
			<input class="btn" type="submit" name="atualizar" value="Atualizar" />
		</form>
	</div>
	<?php	require_once("./view/geral/footer.php");?>    

</body>
</html>
