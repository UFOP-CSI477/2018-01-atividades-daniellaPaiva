<?php
	//Comprovar session...
	session_start();
	$nivel = 3;
	if(!isset($_SESSION['usuario']) || ($_SESSION['type'] != $nivel))
	{
		session_destroy();
		exit();
	}

	//include './view/users/logout.php';
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Área do paciente</title>
	<?php require_once("./view/site/head.php"); ?>
</head>
<body>
	<?php require_once("./view/site/header_paciente.php"); ?>

	<div class="col-md-2"></div>
	<div class="col-md-8" align="center" >
		<h1>Meus exames</h1>
		<table class="table table-bordered table-striped" >
			<thead class="thead-light">
				<th scope="col">Data</th>
				<th scope="col">Procedimentos</th>
				<th scope="col">Valor</th>
				<th scope="col">Alterar</th>
				<th scope="col">Excluir</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach( $lista as $linha ): ?>
			<tr>
				<td><?= $linha['date_test'] ?></td>
		        <td><?= $linha['name'] ?></td>
		        <td><?= $linha['price'] ?></td>
		        <td><a href="#"><i class="material-icons">edit</i></a></td>
                <td><a href="#"><i class="material-icons">delete</i></a></td>
			</tr>
		<?php endforeach ?>
	</tbody>
</table>
</div>
</div>

</body>
</html>



