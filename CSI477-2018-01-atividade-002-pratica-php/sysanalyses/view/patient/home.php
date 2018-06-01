<?php
	//Comprovar session...
	$nivel = 3;
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
	<title>Área do paciente</title>
	<?php require_once("./view/geral/head.php"); ?>
</head>
<body>
	<?php require_once("header.php"); ?>
	

	<div class="container">
		<div class="row" align="center">
			<h1>Meus exames</h1> <br>
		</div>
		
		<div class="row" align="center">
			<div class="col-md-2"></div>
			<div class="col-md-4">
				<h4>Total de exames = <?php echo "$tamanho" ?> </h4>
			</div>
			<div class="col-md-4">
				<h4>Valor total = <?php echo "$valor"?></h4>
			</div>
		</div>
	<br>
	<?php	require_once("./view/tests/list_patient.php");?>	
		
	</div>
	<?php	require_once("./view/geral/footer.php");?>    
</body>
</html>



