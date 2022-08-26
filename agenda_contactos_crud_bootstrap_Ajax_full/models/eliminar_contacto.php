<?php
    include('../conexion/conexion.php');

    $mysql->query("delete from contacto where id='$_REQUEST[id]'") or
    die($mysql->error); 
   
    $mysql->close();
    header('Location:../templates/listado_contactos.php');


  ?>





 