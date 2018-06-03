<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
  <div class="container">
    <a class="navbar-brand" href="router.php?op=1">Sistema de Controle Acadêmico</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item active">
          <a class="nav-link" href="router.php?op=1">Home
            <span class="sr-only">(current)</span>
          </a>
        </li>
        <li class="nav-item">
          <div class="dropdown">
            <a class="nav-link dropdown-toggle"  data-toggle="dropdown">Alunos</a>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="router.php?op=2">Cadastrar Aluno</a>
              <a class="dropdown-item" href="router.php?op=4">Listar Alunos</a>
            </div>
          </div>
        </li>
        <li class="nav-item">
          <div class="dropdown">
            <a class="nav-link dropdown-toggle"  data-toggle="dropdown">Cidades</a>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="router.php?op=5">Cadastrar Cidade</a>
              <a class="dropdown-item" href="router.php?op=7">Listar Cidades</a>
            </div>
          </div>
        </li>
      </ul>
    </div>
  </div>
</nav>
