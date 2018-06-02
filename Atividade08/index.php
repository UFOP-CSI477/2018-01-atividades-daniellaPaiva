<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Sistema de Controle Acadêmico</title>
    <?php require_once("./view/geral/head.php"); ?>
  </head>
  <body>

    <?php
      session_start();
      if ( isset($_SESSION['mensagem']) ) {
        echo "<h2>" . $_SESSION['mensagem'] . "</h2>";
        unset($_SESSION['mensagem']);
      }
    ?>

     <!-- Navigation -->
    <?php require_once("./view/geral/header.php"); ?>

    <!-- Page Content -->
    <?php require_once("./view/geral/content.php"); ?>

    <!-- Footer -->
    <?php require_once("./view/geral/footer.php"); ?>
  


  </body>
</html>
