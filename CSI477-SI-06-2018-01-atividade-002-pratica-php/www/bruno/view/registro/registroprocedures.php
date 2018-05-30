<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="./bootstrap4/css/bootstrap.css">
    <link rel="stylesheet" href="estilos.css">
    <script src="jquery-3.3.1.js"></script>
    <script src="funcoes.js"></script>
    <?php include './view/header.php'; ?>
    <title>Área Administrativa - Cadastro de Procedimentos</title>
  </head>
  <body>
    <br><br><br>
    <center><h3> Área de Cadastro de Procedimentos </h3></center>
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
                            <form class="form" role="form" id="formLogin" method="post" action="router.php?op=15">
                                <div class="form-group" id="grupoV1">
                                    <label for="name">Nome</label>
                                    <input type="text" class="form-control" name="name" id="name" required="">
                                </div>
                                <div class="form-group" id="grupoV2">
                                    <label>Preço</label>
                                    <input type="number" class="form-control" name="preco" id="preco" required="">
                                </div>
                                <input type="submit" name="cadastro" id="cadastro" class="btn btn-success float-right" value="Cadastrar">
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
