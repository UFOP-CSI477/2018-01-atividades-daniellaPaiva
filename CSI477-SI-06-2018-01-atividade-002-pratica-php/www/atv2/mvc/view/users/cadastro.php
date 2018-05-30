<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Cadastrar</title>

    <?php require_once("./view/site/head.php"); ?>
  </head>
  <body>

    <?php require_once("./view/site/header.php"); ?>

    <h1 align="center">Cadastro novo paciente</h1>

  		<form class="cadastro" action="router.php?op=5" method="post" align="center">
  			<input type="text" name="name" id="name" placeholder="Nome" /> <br>
			<input type="text" name="email" id="email" placeholder="Email" /> <br>
			<input type="password" name="password" placeholder="Senha" /> <br>
			<input type="submit" class="cadastrar" value="Cadastrar" />
  	</form>

    <?php require_once("./view/site/footer.php"); ?>
  </body>
</html>