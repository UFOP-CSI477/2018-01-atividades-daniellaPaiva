
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="./bootstrap4/css/bootstrap.css">
    <link rel="stylesheet" href="estilos.css">
    <?php include './view/header.php'; ?>
    <title>Relatórios</title>
  </head>
  <body>
    <?php if(!isset ($_SESSION) == true){
    session_start();
    } 
    ?>
    <br><br><br>
    <center>
      <h3> Relatório Exames por Clientes </h3></center>
    <br>
    <table align="center">
      <thead>
      <tr class="destaque">
        <th class="destaque">Nome</th>
        <th class="destaque" >Quantidade de Exames</th>
        <th class="destaque" >Valor Total</th>
      </tr>
      </thead>
      <tbody>
      <?php 
      use Model\Database;
      $db = Database::getInstance()->getDB();
      $sql = "SELECT DISTINCT users.id as userId, users.name as Uname, SUM(procedures.price) as valor, COUNT(procedures.id) as quantidade FROM tests INNER JOIN procedures ON procedures.id = tests.procedure_id INNER JOIN users ON tests.user_id = users.id WHERE tests.user_id = users.id GROUP BY users.name";
      $lista = $db->query($sql);
      foreach( $lista as $linha ): ?>
      <tr class="destaque">
        <td class="destaque"><?= $linha['Uname'] ?></td>
        <td class="destaque"><?= $linha['quantidade'] ?></td>
        <td class="destaque"><?= $linha['valor'] ?></td>
        <td> 
          <div class="table-responsive"> 
              <input type="hidden" id="idUser" name="idUser" value="<?= $linha['userId'];?>">
              <a id="abuttontomodal" class="btn btn-warning btn-xs" href="#" data-toggle="modal" data-target='#<?= $linha['userId']?>'> Ver Exames</a>
          </div>
        </td>
      </tr>
       <!-- Modal -->
    <div id="<?= $linha['userId']?>" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <center><h5> Exames Marcados por <strong><?= $linha['Uname'] ?></strong> </h5>
                <div class="modal-body">
                <?php 
                $opcoes = "";
                $idUser = $linha['userId'];
                $sql2 = "SELECT procedures.name FROM tests INNER JOIN procedures ON procedures.id = tests.procedure_id WHERE tests.user_id = '$idUser'";
                $lista2 = $db->query($sql2);
                foreach ($lista2 as $row) {
                  echo $row['name'] ?> <br> <?php
                }
                ?>
                <br><br>  
                <button type="button" class="btn btn-danger btn-xs" data-dismiss="modal">Voltar</button>
              </div>
                </div>
            </div>
        </div>
    </div>
    <?php endforeach ?>
    </tbody>
    </table>
  </body>
</html>
