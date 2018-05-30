<?php
	//Comprovar session...
	  session_start();

	  $nivel = 2;

	  if(!isset($_SESSION['usuario']) || ($_SESSION['type'] != $nivel))
	  {
	  	session_destroy();
		exit();
	  }

	  include '../users/logout.php';
?>


<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Área do operador</title>
  </head>
  <body>
  		<h1>BEM VINDO OPERADOR</h1>
  		<a href="?sair">Sair</a>
  </body>
</html>



