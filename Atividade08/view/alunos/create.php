<div class="container" id="context">
	<form action="router.php?op=3" method="post">
		<br><br>
		<div class="row">
			<div class="col-md-4" >
				<h3>Cadastrar Aluno</h3>
			</div>
		</div>
		<br><br>
		<div class="row">
			<div class="col-md-6"> 
				<div class="form-group" id="campo_nome">
					<label for="nome">Nome</label>
					<input type="text" class="form-control" name="nome" id="nome" value="" autofocus>

					<div class="alert alert-danger" style="display: none" id="alerta_nome">
						<p>Informe o nome completo para cadastro.</p>
					</div>
				</div>
			</div>

			<div class="col-md-6"> 
				<div class="form-group" id="campo_mail">
					<label for="mail">Email</label>
					<input type="text" class="form-control" name="mail" id="mail" placeholder="Email">
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-md-6"> 
				<div class="form-group" id="campo_rua">
					<label for="rua">Rua</label>
					<input type="text" class="form-control" name="rua" id="rua" placeholder="Rua">
				</div>
			</div>
			<div class="col-md-2"> 
				<div class="form-group" id="campo_numero">
					<label for="numero">Número</label>
					<input type="text" class="form-control" name="numero" id="numero" placeholder="00">
				</div>
			</div>
			<div class="col-md-4"> 
				<div class="form-group" id="campo_bairro">
					<label for="bairro">Bairro</label>
					<input type="text" class="form-control" name="bairro" id="bairro" placeholder="Bairro">
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6"> 
				<div class="form-group" id="campo_cidade">
					<label for="cidade_id">Cidade:</label><br>
					<select class="form-control" name="cidade_id" id="cidade">
						<option value="0">Selecione:</option>
						<!-- Cidades //-->
						<?php foreach( $lista as $e ): ?>
						<option value="<?= $e['id'] ?>"><?= $e['nome'] ?></option>
					<?php endforeach ?>
				</select>					
			</div>
		</div>
		<div class="col-md-2"> 
			<div class="form-group" id="campo_cep">
				<label for="cep">CEP</label>
				<input type="text" class="form-control" name="cep" id="cep" placeholder="00">
			</div>
		</div>
	</div>
	<br><br>
	<div class="row">
		<div class="col-md-4"></div>
		<div class="col-md-4" align="center">
			<input class="btn btn-success" type="submit" name="salvar" value="Cadastrar" />
		</div>
	</div>
</form>
</div>