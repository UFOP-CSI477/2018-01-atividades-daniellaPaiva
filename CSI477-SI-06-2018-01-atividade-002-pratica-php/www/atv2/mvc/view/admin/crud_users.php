<?php
  //Comprovar session...
    session_start();
    $nivel = 1;

    if(!isset($_SESSION['usuario']) || ($_SESSION['type'] != $nivel))
    {
      session_destroy();
    exit();
    }

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Usuários</title>
  <?php require_once("../site/head.php"); ?>

  </head>
  <body>

     <?php require_once("./header_admin.php"); ?>
     
      <div class="content-wrapper">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-1">
              <h1>
                <a href="/atv2/mvc/view/admin/router.php?op=7">Criar</a>
              </h1>
              <br>
              <h1>
                <a href="#">Aterar</a>
              </h1>
              <br>
              <h1>
                <a href="#">Deletar</a>
              </h1>
              <br>
            </div>

            <div class="col-md-1" >
              <div class="linha-vertical"></div>
            </div>

            <div class="col-md-6" align="center" >
              <table class="table table-bordered table-striped" >
                <thead class="thead-light">
                    <th scope="col">#</th>
                    <th scope="col">Usuário</th>
                    <th scope="col">Email</th>
                    <th scope="col">Tipo</th>
                    <th scope="col">Editar</th>
                    <th scope="col">Deletar</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach( $lista as $linha ): ?>
                    <tr>
                      <td><?= $linha['id'] ?></td>
                      <td><?= $linha['name'] ?></td>
                      <td><?= $linha['email'] ?></td>
                      <td><?= $linha['type'] ?></td>
                      <td><a href="#"><i class="material-icons">edit</i></a></td>
                      <td><a href="#"><i class="material-icons">delete</i></a></td>
                    </tr>
                  <?php endforeach ?>
                </tbody>
            </table>
            </div>
          </div>
        </div>
      </div>
  </body>
</html>



