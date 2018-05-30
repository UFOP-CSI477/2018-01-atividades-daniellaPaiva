<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Lista de Exames</title>
  </head>
  <body>

    <table border="1">

      <tr>
        <th>Data</th>
      </tr>

      <?php foreach( $lista as $linha ): ?>
      <tr>
        <td><?= $linha['date'] ?></td>
      </tr>
    <?php endforeach ?>

    </table>








  </body>
</html>
