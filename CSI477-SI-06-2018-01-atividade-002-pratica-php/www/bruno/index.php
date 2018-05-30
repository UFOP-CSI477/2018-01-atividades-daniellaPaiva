<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="./bootstrap4/css/bootstrap.css">
    <link rel="stylesheet" href="estilos.css">
    <?php include './view/header.php'; ?>
    <title>Sistema de Controle de Solicitações de Análises Laboratoriais</title>
  </head>
  <body>
    <?php if(!isset ($_SESSION) == true){
    session_start();
    } 
    ?>
    <br><br><br>
    <center><h3>Análises Laboratoriais</h3>
      <p> Utilize o menu acima para acessar as informações que precisa
        <p> Você pode conferir a lista de procedimentos disponíveis acessando o menu Área Geral -> Lista de Procedimentos. Ou <a href="router.php?op=3">clicando aqui </a>
        <h6> Cliente, favor cadastrar-se no menu Login -> Cadastrar-se</h6>
    </tbody>
    </table>
  </body>
</html>
