
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="./bootstrap4/css/bootstrap.css">
    <link rel="stylesheet" href="estilos.css">
    <?php include './view/header.php'; ?>
    <title>Lista de Procedimentos</title>
  </head>
  <body>
    <?php if(!isset ($_SESSION) == true){
    session_start();
    } 
    ?>
    <br><br><br>
    <center>
      <h5> Lista de Procedimentos </h5></center>
    <br>
    <table align="center">
      <thead>
      <tr class="destaque">
        <th class="destaque">Nome</th>
        <th class="destaque">Preço</th>
      </tr>
      </thead>
      <tbody>
      <?php 
        use Model\Procedure;
        $procedures = new Procedure;
        $lista2 = $procedures->all();
       foreach( $lista2 as $linha ): ?>
      <tr class="destaque">
        <td class="destaque"><?= $linha['name'] ?></td>
        <td class="destaque"><?= $linha['price'] ?></td>
      </tr>
    <?php endforeach ?>
    </tbody>
    </table>
  </body>
</html>
