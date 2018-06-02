<div class="container">
	<div class="row">
		<div class="col-md-2"></div>
		<div class="col-md-8" align="center" >
			<h1>Lista de Procedimentos</h1><br>
			<table class="table table-bordered table-striped" >
				<thead class="thead-light">
				<tr>
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
</div>
</div>