<div class="container">
	<div class="row" align="center">
		<h1>Relatório de exames por paciente</h1> <br>
	</div>

	<div class="row">
		<div class="col-md-2"></div>
		<div class="col-md-8" align="center" >
			<table class="table table-bordered table-striped" >
				<thead class="thead-light">
					<th scope="col">Nº Exames</th>
					<th scope="col">Paciente</th>
					<th scope="col">Email</th>
					<th scope="col">Valor Total</th>
					<th scope="col">Procedimentos</th>
				</tr>
			</thead>
			<tbody align="center">
				<?php foreach( $lista as $linha ): ?>
				<tr>
					<td><?= $linha['quantidade'] ?></td>
					<td><?= $linha['user_name'] ?></td>
					<td><?= $linha['email'] ?></td>
					<td><?= $linha['valor'] ?></td>
					<td><a class="fa fa-eye" style="font-size:24px" data-toggle="modal" data-target="#myModal"></a></td>
				</tr>
			<?php endforeach ?>
		</tbody>
	</table>
	</div>
	</div>
	  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Modal Header</h4>
        </div>
        <div class="modal-body">
          <p>Some text in the modal.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
</div>
</div>
</div>