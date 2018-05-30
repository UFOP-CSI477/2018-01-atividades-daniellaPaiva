
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
        <th class="destaque">Quantidade de Exames</th>
      </tr>
      </thead>
      <tbody>
      <?php 
      use Model\Database;
      $db = Database::getInstance()->getDB();
      $sql = "SELECT DISTINCT procedures.name as proceName, COUNT(procedures.id) as quantidade, procedures.id as proceId FROM tests INNER JOIN procedures ON procedures.id = tests.procedure_id GROUP BY procedures.name";
      $lista = $db->query($sql);
      foreach( $lista as $linha ): ?>
      <tr class="destaque">
        <td class="destaque"><?= $linha['proceName'] ?></td>
        <td class="destaque"><?= $linha['quantidade'] ?></td>
        <td> 
          <div class="table-responsive"> 
              <input type="hidden" id="idUser" name="idUser" value="<?= $linha['proceId'];?>">
              <a id="abuttontomodal" class="btn btn-warning btn-xs" href="#" data-toggle="modal" data-target='#<?= $linha['proceId']?>'> Clientes</a>
          </div>
        </td>
      </tr>
       <!-- Modal -->
    <div id="<?= $linha['proceId']?>" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <center><h5> Clientes que marcaram exames com o procedimento <strong> <?= $linha['proceName'] ?></strong> </h5>
                <div class="modal-body">
                <?php 
                $idProce = $linha['proceId'];
                $sql2 = "SELECT users.name as Pname FROM tests INNER JOIN procedures ON tests.procedure_id = procedures.id INNER JOIN users ON tests.user_id = users.id WHERE tests.procedure_id = $idProce";
                $lista2 = $db->query($sql2);
                foreach ($lista2 as $row) {
                  echo $row['Pname'] ?> <br> <?php
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
