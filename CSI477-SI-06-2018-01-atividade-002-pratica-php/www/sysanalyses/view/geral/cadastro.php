<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Cadastrar</title>

    <?php require_once("./view/geral/head.php"); ?>
  </head>
  <body>

    <?php require_once("./view/geral/header.php"); ?>

    <h1 align="center">Cadastro novo paciente</h1>

  		<form class="cadastro" action="router.php?op=4" method="post" align="center">
  			<input type="text" name="name" id="name" placeholder="Nome" required=""/> <br>
			<input type="text" name="email" id="email" placeholder="Email" required=""/> <br>
			<input type="password" name="password" placeholder="Senha" required=""/> <br>
			<input type="submit" class="cadastrar" value="Cadastrar" />
  	</form>

    <?php require_once("./view/geral/footer.php"); ?>
  </body>
</html>