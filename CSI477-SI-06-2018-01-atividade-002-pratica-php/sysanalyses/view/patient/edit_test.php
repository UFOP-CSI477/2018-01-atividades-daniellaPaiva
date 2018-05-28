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
		<h1>Editar exame</h1>
		<form class="form-group row" action="router_patient.php?op=5" method="post">
			<input type="text" name="test_id" style="display:none;" value="<?php echo "".$result['id'] ?>">
			
			<select class="form-control" name="procedure_id">
				<!-- Procedures //-->
				<?php foreach( $lista as $e ): ?>
					if(<?$result['procedure_id'] == $e['id']?>){
						<option selected="selected" value="<?= $e['id'] ?>"><?= $e['name'] ?></option>
					}else {
						<option value="<?= $e['id'] ?>"><?= $e['name'] ?></option>
					}
				<?php endforeach ?>
			</select>
			<br>
			<input class="form-control" type="date" name="date_test" id="date_test" value="<?php echo "".$result['date_test'] ?>" /> <br>
			<input class="btn" type="submit" name="atualizar" value="Atualizar" />
		</form>
	</div>
	<?php	require_once("./view/geral/footer.php");?>    

</body>
</html>
