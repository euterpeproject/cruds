<?php
    
    if (empty($_REQUEST["name"]) || empty($_REQUEST["phone"])) {
      header("location: ../templates/listado_contactos.php?mensaje=falta");
      exit();
    }

    include('../conexion/conexion.php');

      $verificar_correo = $mysql->query("select * from contacto where email='$_REQUEST[email]'");

      if (mysqli_num_rows($verificar_correo) > 0) {
        // echo '
        //     <script>
        //       alert("Éste correo ya está registrado, intenta con otro diferente");
        //       location = "../templates/listado_contactos.php";
        //     </script>';
        //     exit();
      } else {
  
        $fecha_nacimiento = $_REQUEST['date'];
        $dia_actual = date("Y-m-d");
        $_REQUEST['age'] = date_diff(date_create($fecha_nacimiento), date_create($dia_actual))->format('%y');

        $resultado = $mysql->query("insert into contacto(name, phone, date, age, address, email) 
        values ('$_REQUEST[name]','$_REQUEST[phone]','$_REQUEST[date]','$_REQUEST[age]',
        '$_REQUEST[address]','$_REQUEST[email]')") or
        die($mysql->error);

      }

    $mysql->close();
    header('Location:../templates/listado_contactos.php');   
    
    if ($resultado == true) {
      header("Location:../templates/listado_contactos.php?mensaje=registrado");
    } else {
      header("location: ../templates/listado_contactos.php?mensaje=error1");
      exit();
    }
    
?> 