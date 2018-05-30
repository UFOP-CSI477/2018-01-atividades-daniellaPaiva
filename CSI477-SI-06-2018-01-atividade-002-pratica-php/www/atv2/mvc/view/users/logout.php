<?php

   if(isset($_GET['sair']))
   {
      session_destroy();
      header("Location: ../../index.php");
   }

?>