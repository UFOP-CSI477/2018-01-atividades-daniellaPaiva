<?php 
use Model\Procedure;
$procedures = new Procedure();
$lista = $procedures->all();
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="./bootstrap4/css/bootstrap.css">
    <link rel="stylesheet" href="estilos.css">
    <script src="jquery-3.3.1.js"></script>
    <script src="funcoes.js"></script>
    <?php include './view/header.php'; ?>
    <title>Área de de Marcação de Exames</title>
  </head>
  <body>
    <br><br><br>
    <center><h3> Marcação de Exames </h3></center>
    <br>
    <div class="container py-5">
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-6 mx-auto">
                    <span class="anchor" id="formLogin"></span>

                    <!-- form card login -->
                    <div class="card">
                        <div class="card-body">
                            <form class="form" role="form" id="formLogin" method="post" action="router.php?op=5">
                                <div class="form-group" id="grupoV1">
                                    <label for="procedureId">Procedimento</label>
            <select class="form-control input-sm" name="procedureId" required="">
            <option value="">SELECIONE</option>
            <?php foreach ($lista as $e): ?>
                <option value="<?= $e['id']?>"><?=$e['name']?> </option>
            <?php endforeach ?>
            <option value=""></option>
            </select>
                                </div>
                                <div class="form-group" id="grupoV2">
                                    <label>Data</label>
                                    <input type="date" class="form-control" name="data" id="data" required="">
                                </div>
                                <input type="submit" name="marcar" id="marcar" class="btn btn-success float-right" value="Marcar">
                            </form>
                        </div>
                        <!--/card-block-->
                    </div>
                    <!-- /form card login -->

                </div>


            </div>
            <!--/row-->

        </div>
        <!--/col-->
    </div>
    <!--/row-->
</div>
<!--/container-->
  </body>
</html>
