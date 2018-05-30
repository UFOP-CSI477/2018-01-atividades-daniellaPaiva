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