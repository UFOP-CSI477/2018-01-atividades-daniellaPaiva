<div class="container">
  <div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-8" align="center" >
      <table class="table table-bordered table-striped" >
        <thead class="thead-light">

          <tr>
            <th>Código</th>
            <th>Cidade</th>
            <th>Estado</th>
          </tr>

          <?php foreach( $lista as $linha ): ?>
          <tr>
            <td><?= $linha['id'] ?></td>
            <td><?= $linha['nome'] ?></td>
            <td><?= $linha['sigla'] ?></td>
          </tr>
        <?php endforeach ?>

      </table>
    </div>
  </div>
</div>
