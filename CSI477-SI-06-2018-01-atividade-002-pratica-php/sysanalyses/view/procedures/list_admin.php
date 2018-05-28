<div class="col-md-2"></div>
	<div class="col-md-8" align="center" >
		<h1>Lista de Procedimentos</h1><br>
		<table class="table table-bordered table-striped" >
			<thead class="thead-light">
				<th scope="col">#</th>
				<th scope="col">Procedimentos</th>
				<th scope="col">Valor</th>
				<th scope="col">Editar</th>
				<th scope="col">Deletar</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach($lista as $linha ): ?>
			<tr>
				<td><?= $linha['id'] ?></td>
				<td><?= $linha['name'] ?></td>
				<td><?= $linha['price'] ?></td>
				<td><a href="/sysanalyses/router_admin.php?op=6&id=<?php echo "".$linha['id'] ?>"><i class="material-icons">edit</i></a></td>
            	<td><a href="/sysanalyses/router_admin.php?op=8&id=<?php echo "".$linha['id'] ?>"><i class="material-icons">delete</i></a></td>
			</tr>
		<?php endforeach ?>
	</tbody>
</table>
</div>