<?php 
use Model\Test;
use Model\Database;
$db = Database::getInstance()->getDB();
$sql = "SELECT tests.user_id, tests.procedure_id as idProcedimento, tests.id, procedures.name, procedures.price, tests.date FROM tests INNER JOIN procedures ON tests.procedure_id = procedures.id ORDER BY tests.date DESC, procedures.name";
$lista = $db->query($sql);
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="./bootstrap4/css/bootstrap.css">
    <link rel="stylesheet" href="estilos.css">
    <?php include './view/header.php'; ?>
    <title>Área Administrativa - Editar Procedimentos</title>
  </head>
  <body>

    <br><br><br>
    <center>
      <h5> Exames Marcados </h5></center>
    <br>
    <table align="center">
      <thead>
      <tr class="destaque">
        <th class="destaque">Paciente (Id)</th>
        <th class="destaque">Procedimento</th>
        <th class="destaque">Data</th>
        <th class="destaque">Preço</th>
        <th class="destaque">Ações</th>
      </tr>
      </thead>
      <tbody>
      <?php foreach( $lista as $linha ): ?>
      <tr class="destaque">
        <td class="destaque"><?= $linha['user_id'] ?></td>
        <td class="destaque"><?= $linha['name'] ?></td>
        <td class="destaque"><?= $linha['date'] ?></td>
        <td class="destaque"><?= $linha['price'] ?></td>
        <td> 
          <div class="table-responsive">  
              <input type="hidden" id="id" name="id" value="<?=$linha['idProcedimento']?>">
              <a id="abuttontomodal" class="btn btn-warning btn-xs" href="#" data-toggle="modal" data-target="#<?=$linha['idProcedimento']?>">Editar</a>
          </div>
      </tr>
      <!-- Modal Editar-->
      <div class="modal fade" id="<?=$linha['idProcedimento']?>" tabindex="-1" role="dialog" aria-labelledby="modalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <div class="card-body">
                            <form class="form" role="form" id="formLogin" method="post" action="router.php?op=14">
                              <div class="form-group">
                              <input type="hidden" name="idProc" id="idProc" value="<?= $linha['idProcedimento']?>">
                                </div>
                                <div class="form-group" id="grupoV1">
                                    <label for="procedureId">Preço</label>
                                  <input type="decimal" name="preco" id="preco" value="<?= $linha['price'] ?>">
                                </div>

                <button type="submit" name="edit" class="btn btn-success btn-xs">Editar</button>
                <button type="button" class="btn btn-danger btn-xs" data-dismiss="modal">Cancelar</button>
              </div>
            </form>
          </div>    
        </div>
      </div>
    </div>
  </div>
</div>
    <?php endforeach ?>
    </tbody>
    </table>
  </td>
  </body>
</html>
