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