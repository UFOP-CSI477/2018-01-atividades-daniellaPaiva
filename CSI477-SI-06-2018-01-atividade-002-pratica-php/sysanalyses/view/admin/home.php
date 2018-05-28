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
    <title>Área do administrador</title>
  	
  	<?php require_once("./view/geral/head.php"); ?>
  </head>
  <body>
      <?php require_once("header.php"); ?>

      <div class="container">
        <div class="row">
          <div class="col-md-2"></div>
          <div class="col-md-4">
            <a href="?op=2">Usuários</a>
          </div>
          <div class="col-md-4">
            <a href="?op=1">Exames</a>
          </div>
        </div>

        <div class="row">
          <div class="col-md-2"></div>
          <div class="col-md-4">
            <a href="?op=6">Procedimentos</a>
          </div>
          <div class="col-md-4">
            <a href="?op=1">Gerar Relatórios</a>
          </div>
        </div>
      </div>
  		
      <?php require_once("./view/geral/footer.php"); ?>
  </body>
</html>



