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

	<?php 
		require_once("./view/admin/header.php"); 
	?>

	<div class="container">
		<div class="row" align="center">
			<div class="col-md-2"></div>
			<div class="col-md-4"><a href="?op=14"><h3>Relatório de exames por paciente</h3></a></div>
			<div class="col-md-5"><a href="?op=15"><h3>Relatório de exames por procedimento</h3></a></div>
		</div>
	</div>

	<?php 
		require_once("./view/tests/list.php");
		require_once("./view/geral/footer.php");
	?>    

</body>
</html>


