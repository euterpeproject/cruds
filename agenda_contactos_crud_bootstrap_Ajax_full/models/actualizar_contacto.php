<?php

    if (!isset($_REQUEST['id'])) {
      header("location:../templates/listado_contactos.php?mensaje=error");
      exit();
    }

    include('../conexion/conexion.php');

    $verificar_correo = $mysql->query("select * from contacto where email='$_REQUEST[email]'");   
      if (mysqli_num_rows($verificar_correo) > 0) {
        // echo '<script>
        //         alert("Éste correo ya está registrado, intenta con otro diferente");
        //         location = "../templates/listado_contactos.php";
        //       </script>';
        //       exit();
        
      } else {

        $fecha_nacimiento = $_REQUEST['date'];
        $dia_actual = date("Y-m-d");
        $_REQUEST['age'] = date_diff(date_create($fecha_nacimiento), date_create($dia_actual))->format('%y');

        $resultado = $mysql->query("update contacto set name='$_REQUEST[name]', phone='$_REQUEST[phone]', 
        date='$_REQUEST[date]', age='$_REQUEST[age]', address='$_REQUEST[address]', email='$_REQUEST[email]' 
        where id='$_REQUEST[id]'") or 
        die($mysql->error);
    } 
    
    $mysql->close();
      header('Location:../templates/listado_contactos.php');

    if ($resultado == true) {
      header("Location:../templates/listado_contactos.php?mensaje=editado");
      exit();
    } else {
      header("location: ../templates/listado_contactos.php?mensaje=error2");
      // header("location: ../templates/listado_contactos.php?mensaje=error2&pagina=2"); //en prueba
      exit();
    } 



?> 







