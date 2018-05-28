<div class="container">
	<div class="row" align="center">
		<h1>Lista de Exames</h1> <br>
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
					<td><?= $linha['email'] ?></td>
					<td><?= $linha['name'] ?></td>
					<td><?= $linha['price'] ?></td>
				</tr>
			<?php endforeach ?>
		</tbody>
	</table>
</div>
</div>
</div>