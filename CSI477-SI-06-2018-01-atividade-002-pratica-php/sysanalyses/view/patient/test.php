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
	<title>Sistema de Controle de Solicitações de Análises Laboratoriais</title>


	<?php require_once("./view/geral/head.php"); ?>

</head>
<body>

	<?php require_once("./view/patient/header.php"); ?>

	<div class="col-md-4"></div>
	<div class="col-md-4" align="center">
		<h1>Novo exame</h1>
		<form class="form-group row" action="router_patient.php?op=3" method="post">
			<select class="form-control" name="procedure_id">
				<option value="">Selecione:</option>
				<!-- Procedures //-->
				<?php foreach( $lista as $e ): ?>
				<option value="<?= $e['id'] ?>"><?= $e['name'] ?></option>
			<?php endforeach ?>
		</select>
		<br>

		<input class="form-control" type="date" name="date" id="date" /> <br>
		<input class="btn" type="submit" name="salvar" value="salvar" />
	</form>
</div>
<?php	require_once("./view/geral/footer.php");?>    

</body>
</html>
