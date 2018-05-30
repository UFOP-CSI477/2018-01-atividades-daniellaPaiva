<?php
namespace Controller;
use Model\Procedure;
class ProceduresController {
  public function listar() {
    // Acesso ao Modelo
    $procedure = new Procedure();
    // Manipular dados
    $lista = $procedure->all();
    // Invocar a View
    include './view/procedures/lista.php';
  }

   function updateOp($id, $price){
        $procedure =new Procedure;
        $result = $procedure->updateOp($id, $price);
       if ($result == false) {
            echo"<script type='text/javascript'>alert('Problemas ao editar!');
            </script>";
        } else {
            echo"<script type='text/javascript'>alert('Procedimento editado com sucesso!');
            location.href='./router.php?op=8'
            </script>";
        }
    }

    function update($id, $name, $price){
        $procedure =new Procedure;
        $result = $procedure->update($id, $name, $price);
       if ($result == false) {
            echo"<script type='text/javascript'>alert('Problemas ao editar!');
            </script>";
        } else {
            echo"<script type='text/javascript'>alert('Procedimento editado com sucesso!');
            location.href='./router.php?op=16'
            </script>";
        }
    }

    function delete($id){
        $procedure =new Procedure;
        $result = $procedure->delete($id);
       if ($result == 2) {
            echo"<script type='text/javascript'>alert('Existem exames com esse procedimento. Não é possível excluir!');
            location.href='./router.php?op=16'
            </script>";
        }else if ($result == 1){
        	echo"<script type='text/javascript'>alert('Não é possível excluir!');
        	location.href='./router.php?op=16'
            </script>";
        }else{
            echo"<script type='text/javascript'>alert('Procedimento excluido com sucesso!');
            location.href='./router.php?op=16'
            </script>";
        }
    }

     function insert($name, $price){
        $procedure =new Procedure;
        $result = $procedure->insert($name, $price);
       if ($result == false) {
            echo"<script type='text/javascript'>alert('Problemas ao cadastrar!');
            </script>";
        } else {
            echo"<script type='text/javascript'>alert('Procedimento cadastrado com sucesso!');
            location.href='./router.php?op=9'
            </script>";
        }
    }
}
