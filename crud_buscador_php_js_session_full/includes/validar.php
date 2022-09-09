<?php
include('./db.php');

if (isset($_POST['registrar'])) {
    
    if (strlen($_POST['nombre'])>=1 && strlen($_POST['correo']) >=1 && strlen($_POST['telefono']) >=1 
    && strlen($_POST['clave']) >=1 && strlen($_POST['rol']) >=1 ) {

        $nombre = trim($_POST['nombre']);
        $correo = trim($_POST['correo']);
        $telefono = trim($_POST['telefono']);
        $clave = trim($_POST['clave']);
        $rol = trim($_POST['rol']);

        // $unique_salt_string = hash('md5', microtime()); 
        // $clave = hash('md5', $_POST['clave'].'static_salt'.$unique_salt_string);

        $verificar_correo = $mysqli->query("select * from usuarios where correo='$_REQUEST[correo]'");

        if (mysqli_num_rows($verificar_correo) > 0) {
         
        } else {
  
            $consulta = "insert into usuarios (nombre, correo, telefono, clave, rol)
            values('$nombre', '$correo', '$telefono', md5('$clave'), '$rol')";

            $mysqli->query($consulta);

        }

        $mysqli->close();

        header("location:../views/usuarios.php");

        if ($consulta == true) {
            header("Location:../views/usuarios.php?mensaje=registrado");
        } else {
            header("location: ../views/usuarios.php?mensaje=error");
            exit();
        }

    }
}
?>