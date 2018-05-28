<div class="container">
	<div class="row">
		<div class="col-md-12" align="center">
			<h1>Novo exame</h1>
		</div>
	</div>
	<form class="form-group row" action="router_patient.php?op=3" method="post">
		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-8" align="center">
				<h2>Lista de Procedimentos</h2><br>
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
						<td><input type="checkbox" name="check_proc[]" value="<?php echo "".$linha['id']?>"></td>
						<td><?= $linha['name'] ?></td>
						<td><?= $linha['price'] ?></td>
					</tr>
				<?php endforeach ?>
			</tbody>
		</table>
	</div>
</div>
<div class="row">
	<div class="col-md-5"></div>
	<div class="col-md-2" align="center">
		<br>
		<input class="form-control" type="date" name="date" id="date" /> <br>
		<input class="btn btn-success" type="submit" name="salvar" value="Salvar" />
	</div>
</div>
</form>
</div>
</div>