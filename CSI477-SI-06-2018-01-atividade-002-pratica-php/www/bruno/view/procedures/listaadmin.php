<?php 
use Model\Procedure;
$procedures = new Procedure;
$lista = $procedures->all();
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
      <h3> Editar Procedimentos </h3></center>
    <br>
    <table align="center">
      <thead>
      <tr class="destaque">
        <th class="destaque">Procedimento</th>
        <th class="destaque">Data</th>
        <th class="destaque">Ações</th>
      </tr>
      </thead>
      <tbody>
      <?php foreach( $lista as $linha ): ?>
      <tr class="destaque">
        <td class="destaque"><?= $linha['name'] ?></td>
        <td class="destaque"><?= $linha['price'] ?></td>
        <td> 
          <div class="table-responsive">
            <form method="post" action="router.php?op=18">  
              <input type="hidden" id="idProc" name="idProc" value="<?=$linha['id']?>">
              <a id="abuttontomodal" class="btn btn-warning btn-xs" href="#" data-toggle="modal" data-target="#<?=$linha['id']?>">Editar</a>
              <button type="submit" name="delete" class="btn btn-danger btn-xs">Excluir</button>
            </form>
          </div>
      </tr>
      <!-- Modal Editar-->
      <div class="modal fade" id="<?=$linha['id']?>" tabindex="-1" role="dialog" aria-labelledby="modalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <div class="card-body">
                            <form class="form" role="form" id="formLogin" method="post" action="router.php?op=17">
                              <div class="form-group">
                              <input type="hidden" name="idProc" id="idProc" value="<?= $linha['id']?>">
                                </div>
                                <div class="form-group">
                                    <label for="procedureId">Nome</label>
                                  <input type="text" name="name" id="name" value="<?= $linha['name'] ?>">
                                </div>
                                <div class="form-group">
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
