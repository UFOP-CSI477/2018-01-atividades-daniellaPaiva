<?php 

include './model/Database.php';
include './model/Procedure.php';
include './controller/ProceduresController.php';
use Controller\ProceduresController;

$procController = new ProceduresController;
$lista = $procController->listar();

?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Sistema de Controle de Solicitações de Análises Laboratoriais</title>


	<?php require_once("./view/site/head.php"); ?>

</head>
<body>

	<?php require_once("./view/site/header.php"); ?> 

	<div class="col-md-2"></div>
	<div class="col-md-8" align="center" >
		<h1>Lista de Procedimentos</h1>
		<table class="table table-bordered table-striped" >
			<thead class="thead-light">
				<th scope="col">#</th>
				<th scope="col">Procedimentos</th>
				<th scope="col">Valor</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach($lista as $linha ): ?>
			<tr>
				<td><?= $linha['id'] ?></td>
				<td><?= $linha['name'] ?></td>
				<td><?= $linha['price'] ?></td>
			</tr>
		<?php endforeach ?>
	</tbody>
</table>
</div>

<?php require_once("./view/site/footer.php"); ?>     
</body>
</html>


