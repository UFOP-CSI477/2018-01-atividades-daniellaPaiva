<?php
namespace Controller;
use Model\Test;
class TestsController {
  public function listar() {
    // Acesso ao Modelo
    $test = new Test();
    // Manipular dados
    $lista = $test->all();
    // Invocar a View
    //include './view/test/lista.php';
  }

  function insert($date, $procedure){
        $tests =new Test;
        $result = $tests->insert($date, $procedure);
       if ($result == false) {
            echo"<script type='text/javascript'>alert('Problemas ao marcar!');
            </script>";
        } else {
            echo"<script type='text/javascript'>alert('Exame marcado com sucesso!');
            location.href='./router.php?op=7';
            </script>";
        }
    }

     function update($id, $procedure, $date){
        $tests =new Test;
        $result = $tests->update($id, $procedure, $date);
       if ($result == false) {
            echo"<script type='text/javascript'>alert('Problemas ao editar!');
            </script>";
        } else {
            echo"<script type='text/javascript'>alert('Exame editado com sucesso!');
            location.href='./router.php?op=11'
            </script>";
        }
    }

     function remove($id){
        $tests = new Test;
        $result = $tests->remove($id);
       if ($result == false) {
            echo"<script type='text/javascript'>alert('Problemas ao cancelar!');
            </script>";
        } else {
            echo"<script type='text/javascript'>alert('Exame cancelado!');
            location.href='./router.php?op=11';
            </script>";
        }
    }
}

