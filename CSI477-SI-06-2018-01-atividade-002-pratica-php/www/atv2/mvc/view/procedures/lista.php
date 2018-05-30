<?php
  //Comprovar session...
  session_start();
  $nivel = 3;
  $header = 1;

  if(isset($_SESSION['usuario']) && ($_SESSION['type'] == $nivel))
  {
    $header = 3;
  }

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Lista de Procedimentos</title>
  <?php require_once("./view/site/head.php"); ?>
</head>
<body>

  <?php 
    if($header == 3){
      require_once("./view/site/header_paciente.php"); 
    } else{
      require_once("./view/site/header.php"); 
    }
  ?>
  <div class="col-md-2"></div>
  <div class="col-md-8" align="center" >
    <h1>Lista de Procedimentos</h1>
    <table class="table table-bordered table-striped" >
      <thead class="thead-light">
        <th scope="col">#</th>
        <th scope="col">Procedimentos</th>
        <th scope="col">Valor</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach( $lista as $linha ): ?>
      <tr>
        <td><?= $linha['id'] ?></td>
        <td><?= $linha['name'] ?></td>
        <td><?= $linha['price'] ?></td>
      </tr>
    <?php endforeach ?>
  </tbody>
</table>
</div>
</body>
</html>
