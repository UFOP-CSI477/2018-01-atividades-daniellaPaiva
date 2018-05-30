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
					<h1>Novo Usuário</h1>
					<form class="form-group" action="/atv2/mvc/view/admin/router.php?op=8" method="post">
						<input type="text" name="name" id="name" placeholder="Nome" /> <br>
						<input type="text" name="email" id="email" placeholder="Email" /> <br>
						<input type="text" name="password" id="password" placeholder="Password" /> <br>
						<input type="text" name="type" id="type" placeholder="Tipo" /> <br>
						<input type="submit" name="salvar" value="Salvar" />
					</form>
				</div>
			</div>
		</div>
	</div>
</body>
</html>



