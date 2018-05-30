<?php
//Comprovar session...
session_start();
$nivel = 3;

if(!isset($_SESSION['usuario']) || ($_SESSION['type'] != $nivel))
{
  session_destroy();
  exit();
}

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Marcar exame</title>
  <?php require_once("./view/site/head.php"); ?>

</head>
<body>

  <?php require_once("./view/site/header_paciente.php"); ?>
  <div class="col-md-4"></div>
  <div class="col-md-4" align="center">
    <h1>Novo exame</h1>
    <form class="form-group row" action="router.php?op=8" method="post">
      <input class="form-control" type="text" name="procedure" id="procedure" placeholder="Procedimento" /> <br>
      <input class="form-control" type="date" name="date" id="date" /> <br>
      <input class="btn" type="submit" name="salvar" value="salvar" />
    </form>
  </div>
</body>
</html>



