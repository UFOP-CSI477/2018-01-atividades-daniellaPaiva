<div class="container">
	<div class="row" align="center">
		<h1>Relatório de exames por procedimento</h1> <br>
	</div>

	<div class="row">
		<div class="col-md-2"></div>
		<div class="col-md-8" align="center" >
			<table class="table table-bordered table-striped" >
				<thead class="thead-light">
					<th scope="col">Nº Exames</th>
					<th scope="col">Procedimento</th>
					<th scope="col">Valor</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach( $lista as $linha ): ?>
				<tr>
					<td><?= $linha['quantidade'] ?></td>
					<td><?= $linha['name'] ?></td>
					<td><?= $linha['price'] ?></td>
				</tr>
			<?php endforeach ?>
		</tbody>
	</table>
</div>
</div>
</div>