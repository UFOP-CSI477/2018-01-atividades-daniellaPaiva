<?php
use Model\Test;
use Model\Procedure;
use Model\Database;
use Controller\TestsController;
$db         = Database::getInstance()->getDB();
$idUser     = $_SESSION['id'];
$sql        = "SELECT tests.procedure_id, tests.id, procedures.name, procedures.price, tests.date FROM            tests INNER JOIN procedures ON tests.procedure_id = procedures.id 
              WHERE tests.user_id = '$idUser' ORDER BY tests.date DESC, procedures.name";

$sql2       = "SELECT SUM(procedures.price) FROM tests INNER JOIN procedures ON tests.procedure_id =              procedures.id WHERE tests.user_id = '$idUser'";
$lista      = $db->query($sql);
$lista2     = $db->query($sql2);
$procedures = new Procedure;
$lista3     = $procedures->all();
$options = "";

foreach ($lista3 as $row) {
    $options .= sprintf('<option value="%s">%s</option>' . PHP_EOL, $row['id'], $row['name'] );
 }
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="./bootstrap4/css/bootstrap.css">
    <link rel="stylesheet" href="estilos.css">
    <?php
      include './view/header.php';
    ?>
   <title>Historico de Exames</title>
  </head>
  <body>

    <br><br><br>
    <center>
      <h3> Exames Marcados </h3></center>
    <br>
    <table align="center">
      <thead>
      <tr class="destaque">
        <th class="destaque">Procedimento</th>
        <th class="destaque">Data</th>
        <th class="destaque">Preço</th>
        <th class="destaque">Ações</th>
      </tr>
      </thead>
      <tbody>
      <?php
        foreach ($lista as $linha):
      ?>
     <tr class="destaque">
        <td class="destaque"><?= $linha['name'] ?></td>
        <td class="destaque"><?= $linha['date'] ?></td>
        <td class="destaque"><?= $linha['price'] ?></td>
        <td> 
          <div class="table-responsive">
            <form method="post" action="router.php?op=12">  
              <input type="hidden" id="idTestRemove" name="idTestRemove" value="<?= $linha['id'];?>">
              <a id="abuttontomodal" class="btn btn-warning btn-xs" href="#" data-toggle="modal" data-target='#<?= $linha['id']?>'>Editar</a>
              <button type="submit" name="delete" class="btn btn-danger btn-xs">Cancelar Exame</button>
            </form>
          </div>
        </td>
           <!-- Modal -->
    <div id="<?= $linha['id']?>" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-body">
                    <form action="router.php?op=13" method="post">
                <div class="form-group">  
                  <input type="hidden" name="idTest" id="idTest" class="form-text" value="<?=$linha['id']?>">
                   <select class="form-control input-sm" name="procedureId" id="procedureId">
            <option value="<?=$linha['procedure_id']?>"><?=$linha['name']?></option>
                <?= $options ?>
          </select>
            <input type="date" name="data" value="<?=$linha['date']?>">
                <button type="submit" name="edit" class="btn btn-success btn-xs">Editar</button>
                <button type="button" class="btn btn-danger btn-xs" data-dismiss="modal">Cancelar</button>
              </div>
            </form>
                </div>
            </div>
        </div>
    </div>
      <?php endforeach ?>
     </tr>
      <tr>
        <td class="destaque" colspan="2"><strong>TOTAL</strong></td>
        <td class="destaque"><strong><?= $lista2->fetchColumn(0) ?></strong></td>
      </tr>
    </tbody>
    </table>
  </body>
</html>