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
	<title>Operador - Lista Exames</title>
	<?php require_once("./view/geral/head.php"); ?>
</head>
<body>
	<?php require_once("header.php"); ?>
	<?php require_once("./view/tests/list.php");?>    
	<?php require_once("./view/geral/footer.php");?>    
</body>
</html>



