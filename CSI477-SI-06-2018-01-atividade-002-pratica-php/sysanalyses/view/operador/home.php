<?php
	//Comprovar session...
	$nivel = 2;
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
	<title>Operador - Lista Exames</title>
	<?php require_once("./view/geral/head.php"); ?>
</head>
<body>
	<?php require_once("header.php"); ?>
	

	<div class="container">
		<div class="row" align="center">
			<h1>Exames</h1> <br>
		</div>

		<div class="row">
			<div class="col-md-1"></div>
				<div class="col-md-10" align="center" >
					<table class="table table-bordered table-striped" >
						<thead class="thead-light">
							<th scope="col">Data</th>
							<th scope="col">Paciente</th>
							<th scope="col">Procedimentos</th>
							<th scope="col">Valor</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach( $lista as $linha ): ?>
							<tr>
								<td><?= $linha['date_test'] ?></td>
						        <td><?= $linha['user_id'] ?></td>
						        <td><?= $linha['procedure_id'] ?></td>
						        <td><?= $linha['procedure_id'] ?></td>
							</tr>
							<?php endforeach ?>
						</tbody>
					</table>
				</div>
		</div>
	</div>
	<?php	require_once("./view/geral/footer.php");?>    
</body>
</html>



