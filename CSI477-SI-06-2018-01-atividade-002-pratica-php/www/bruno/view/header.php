<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="estilos.css">
  </head>
  <body>
    <?php if(!isset ($_SESSION) == true){
    session_start();
    } 
    ?>
    <!-- Links //-->
 <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="index.php">Analyses</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Área Paciente</a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="router.php?op=7">Marcar Exames</a>
                  <a class="dropdown-item" href="router.php?op=11">Histórico de Marcações</a>
                </div>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Área Geral</a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="router.php?op=3">Lista de Procedimentos</a>
                </div>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Área Administrativa</a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="router.php?op=8">Editar Procedimentos - Operário</a>
                  <a class="dropdown-item" href="router.php?op=9">Cadastro de Procedimentos</a>
                  <a class="dropdown-item" href="router.php?op=16">Editar Procedimentos - Administrador</a>
                  <a class="dropdown-item" href="router.php?op=19">Relatórios Exames por Cliente</a>
                  <a class="dropdown-item" href="router.php?op=20">Relatórios Exames por Procedimento</a>
                </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="router.php?op=1"><?php 
                  if(!isset ($_SESSION['name']) == true){
                    echo 'Login'; ?> </a></li> <?php
                  }else{ 
                    ?> </a></li>
                    <li class="nav-item dropdown">
                     <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <?php echo $_SESSION['name']; ?>
                      </a>
                      <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                           <a class="dropdown-item" href="router.php?op=10">Logout</a>
                      </div>
                    <?php
                  }
                ?>
          </ul>
        </div>
      </div>
    </nav>

  </body>
</html>
