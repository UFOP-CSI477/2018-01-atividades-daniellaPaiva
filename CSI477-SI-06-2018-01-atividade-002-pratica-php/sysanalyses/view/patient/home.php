<?php
	//Comprovar session...
	$nivel = 3;
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
	<title>Área do paciente</title>
	<?php require_once("./view/geral/head.php"); ?>
</head>
<body>
	<?php require_once("header.php"); ?>
	

	<div class="container">
		<div class="row" align="center">
			<h1>Meus exames</h1> <br>
		</div>
		
		<div class="row" align="center">
			<div class="col-md-2"></div>
			<div class="col-md-4">
				<h4>Total de exames = <?php echo "$tamanho" ?> </h4>
			</div>
			<div class="col-md-4">
				<h4>Valor total = <?php echo "$valor"?></h4>
			</div>
		</div>

		<div class="row">
			<div class="col-md-1"></div>
				<div class="col-md-10" align="center" >
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
						        <td><a href="/sysanalyses/router_patient.php?op=4&id=<?php echo "".$linha['id'] ?>"><i class="material-icons">edit</i></a></td>
				                <td><a href="/sysanalyses/router_patient.php?op=6&id=<?php echo "".$linha['id'] ?>"><i class="material-icons">delete</i></a></td>
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



