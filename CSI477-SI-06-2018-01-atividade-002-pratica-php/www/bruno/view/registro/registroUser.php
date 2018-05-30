<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="./bootstrap4/css/bootstrap.css">
    <link rel="stylesheet" href="estilos.css">
    <script src="jquery-3.3.1.js"></script>
    <script src="funcoes.js"></script>
    <?php include './view/header.php'; ?>
    <title>Cadastro de Usuário</title>
  </head>
  <body>
    <br><br><br>
    <center><h3> Área de Cadastro </h3></center>
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
                            <form class="form" role="form" id="formLogin" method="post" action="router.php?op=6">
                                <div class="form-group" id="grupoV0" style="display: none">
                                  <label for="name">Tipo</label>
                                    <select class="form-control input-sm" name="type" id="type">
                                        <option value="">SELECIONE</option>
                                        <option value="1">Administrador</option>
                                        <option value="2">Operador</option>
                                        <option value="3">Paciente</option>
                                    </select>
                                </div>

                                <div class="form-group" id="grupoV1">
                                    <label for="name">Usuário</label>
                                    <input type="text" class="form-control" name="name" id="name" required="">
                                </div>
                                <div class="form-group" id="grupoV2">
                                    <label>Senha</label>
                                    <input type="password" class="form-control" name="senha" id="senha" required="" autocomplete="new-password">
                                </div>
                                <div class="form-group" id="grupoV3">
                                    <label>Email</label>
                                    <input type="email" class="form-control" name="email" id="email" required="">
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
