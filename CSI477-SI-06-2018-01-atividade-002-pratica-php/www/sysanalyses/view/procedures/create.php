<div class="container">
	<div class="row" align="center">
		<h1>Novo procedimento</h1><br>
	</div>
	<div class="row">
		<form class="form-group row" action="router_admin.php?op=11" method="post" id="create_proc">
			<div class="row">
				<div class="col-md-4">
					<label><h3>Nome do procedimento</h3></label>
				</div>
			</div>
			<div class="row">
				<div class="col-md-4">
					<input class="form-control" type="text" name="name" id="name" placeholder="Nome" required=""/> <br>
				</div>
			</div>
			<div class="row">
				<div class="col-md-4">
					<label><h3>Valor</h3></label>
				</div>
			</div>
			<div class="row">
				<div class="col-md-4">
					<input class="form-control" type="number" name="price" id="price" placeholder="0.00" required=""/> <br>
				</div>
			</div>			
			<input class="btn btn-success" type="submit" name="salvar" value="Salvar" />
		</form>
	</div>
</div>