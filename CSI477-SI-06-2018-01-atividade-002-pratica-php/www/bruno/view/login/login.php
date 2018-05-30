<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="./bootstrap4/css/bootstrap.css">
    <link rel="stylesheet" href="estilos.css">
    <script src="jquery-3.3.1.js"></script>
    <script src="funcoes.js"></script>
    <?php include './view/header.php'; ?>
    <title>Área de Acesso</title>
  </head>
  <body>

    <br><br><br>
    <center><h3> Área de Acesso </h3></center>
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
                            <form class="form" role="form" id="formLogin" method="post" action="router.php?op=4">
                                <div class="form-group" id="grupoV1">
                                    <label for="username">Usuário</label>
                                    <input type="email" class="form-control" name="username" id="username" required="">
                                </div>
                                <div class="form-group" id="grupoV2">
                                    <label>Senha</label>
                                    <input type="password" class="form-control" name="senha" id="senha" required="" autocomplete="new-password">
                                </div>
                                <a href="./router.php?op=2"> Cadastrar-se
                                <input type="submit" name="login" id="login" class="btn btn-success float-right" value="login">
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
