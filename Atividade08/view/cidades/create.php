<div class="container">
  <br><br><br>
  <div class="row">
    <div class="col-md-4" >
      <h3>Cadastrar Cidade</h3>
    </div>
  </div>
  <br>
  <div class="row">
    <div class="col-md-4">
    <form method="post" action="router.php?op=6">
      <div class="form-group">
        <label for="nome">Nome:</label> <br>
        <input class="form-control" type="text" name="nome">
      </div>
      <div class="form-group">
        <label for="estado_id">Estado:</label><br>
        <select class="form-control" name="estado_id">
          <option value="">Selecione:</option>
          <!-- Estados //-->
          <?php foreach( $lista as $e ): ?>
          <option value="<?= $e['id'] ?>"><?= $e['nome'] ?></option>
        <?php endforeach ?>
      </select>
    </div>
    <br><br>
    <input class="btn btn-secondary" type="reset" value="Limpar">
    <input class="btn btn-success" type="submit" value="Cadastrar">

  </form>
  </div>
</div>