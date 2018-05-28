<?php
  if(isset($_SESSION['user'])){
    unset($_SESSION['user']);
    unset($_SESSION['type']);
  }
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Login</title>

     <?php require_once("./view/geral/head.php"); ?>

  </head>
  <body>

    <?php require_once("./view/geral/header.php"); ?>

  		<form action="router.php?op=2" method="post" class="form_login">

        <div class="imgcontainer">
          <img src="/sysanalyses/public/imagens/avatar_login.png" alt="Avatar" class="avatar">
       </div>
			
        <input type="text" name="email" id="email" placeholder="Email" /><br>
  			<input type="password" name="password" placeholder="Senha" /><br>
  			<input type="submit" class="entrar" value="Entrar" />

        <br><br>
        <a class="cadastro" href="router.php?op=3">Cadastrar</a>
  	</form>

    <?php require_once("./view/geral/footer.php"); ?>
  </body>
</html>