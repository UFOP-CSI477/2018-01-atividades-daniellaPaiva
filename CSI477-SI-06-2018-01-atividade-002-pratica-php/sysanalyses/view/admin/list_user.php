<?php
  //Comprovar session...
$nivel = 1;
if(!isset($_SESSION['user']) || ($_SESSION['type'] != $nivel))
{
    //Tela de login
  header("Location: router.php?op=1");
}
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Sistema de Controle de Solicitações de Análises Laboratoriais</title>


  <?php require_once("./view/geral/head.php"); ?>

</head>
<body>

  <?php require_once("./view/admin/header.php"); ?>

  <div class="container">
    <div class="row" align="center">
      <h1>Usuários</h1> <br>
    </div>

    <div class="row">
      <div class="col-md-1"></div>
      <div class="col-md-10" align="center" >
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
            <td><a href="/sysanalyses/router_admin.php?op=3&id=<?php echo "".$linha['id'] ?>"><i class="material-icons">edit</i></a></td>
            <td><a href="/sysanalyses/router_admin.php?op=5&id=<?php echo "".$linha['id'] ?>"><i class="material-icons">delete</i></a></td>
          </tr>
        <?php endforeach ?>
      </tbody>
    </table>
  </div>
</div>
<div class="row">
  <div class="col-md-12" align="center">
    <a class="btn btn-success" href="/sysanalyses/router_admin.php?op=12">Adicionar</a>
  </div>
</div>
</div>

<?php require_once("./view/geral/footer.php");?>    

</body>
</html>
