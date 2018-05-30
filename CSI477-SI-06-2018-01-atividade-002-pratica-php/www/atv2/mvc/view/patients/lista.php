<?php
  //Comprovar session...
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
    <title>Lista de Exames</title>
    
    <?php require_once("./view/site/head.php"); ?>

  </head>
  <body>

     <?php require_once("./view/site/header_paciente.php"); ?>

    <table border="1">

      <tr>
        <th>Data</th>
        <th>Procedimento</th>
        <th>Valor</th>
        <th>Excluir</th>
      </tr>

      <?php foreach( $lista as $linha ): ?>
      <tr>
        <td><?= $linha['date_test'] ?></td>
        <td><?= $linha['name'] ?></td>
        <td><?= $linha['price'] ?></td>
        <td><a href="router.php?op=10">Deletar</a></td>
      
      </tr>
    <?php endforeach ?>

    </table>
  </body>
</html>
