<!DOCTYPE html>
<html>

  <head>
	<meta charset="utf-8">
	<title>Sistema de Controle Acadêmico</title>

  <?php
      session_start();
      if ( isset($_SESSION['mensagem']) ) {
        echo "<script>alert('" . $_SESSION['mensagem'] . "');</script>";
        unset($_SESSION['mensagem']);
      }
    ?>

	<?php require_once("./view/geral/head.php"); ?>

</head> 

  <body>

    <!-- Navigation -->
    <?php require_once("./view/geral/header.php"); ?>

    <!-- Page Content -->
    <?php require_once("./view/cidades/lista.php"); ?>

    <!-- Footer 
    <?php //require_once("./view/geral/footer.php"); ?>
  -->

  </body>

</html>
