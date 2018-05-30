<?php
	//Comprovar session...
	  session_start();

	  $nivel = 1;

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
    <title>Área do administrador</title>
  	
  	<?php require_once("../site/head.php"); ?>
  </head>
  <body>
       <?php require_once("./header_admin.php"); ?>
  		<h1>BEM VINDO ADMINISTRADOR</h1>

  		<h1><a href="/atv2/mvc/view/admin/router.php?op=3">Relatório de exames solicitados</a></h1>
  		
  </body>
</html>



