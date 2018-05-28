<?php

include './model/Database.php';
include './model/Procedure.php';

use Model\Procedure;

$procedure = new Procedure();
$lista = $procedure->all();

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
		require_once("./view/geral/header.php"); 
		require_once("./view/procedures/list.php");
		require_once("./view/geral/footer.php");
	?>    

</body>
</html>


