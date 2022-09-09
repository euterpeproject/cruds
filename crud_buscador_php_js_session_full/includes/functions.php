<?php

require_once("db.php");

if (isset($_POST['accion'])) {
    switch ($_POST['accion']) {
        //casos de registros
        case 'editar_registro':
            editar_registro();
            break;
        case 'eliminar_registro':
            eliminar_registro();
            break;
        case 'acceso_user':
        acceso_user();
        break;
    }
}

function editar_registro() {
    include('./db.php');
    extract($_POST);

    // $unique_salt_string = hash('md5', microtime()); 
    // $clave = hash('md5', $_POST['clave'].$unique_salt_string);

    //$hash = password_hash($clave, PASSWORD_BCRYPT);

    $verificar_correo = $mysqli->query("select * from usuarios");
    $fila = mysqli_num_rows($verificar_correo);

    if ($fila > 0) {

        $consulta = ("update ignore usuarios set nombre='$nombre', correo='$correo', telefono='$telefono', 
        clave=md5('$clave'), rol='$rol' where id='$id' ");

        $mysqli->query($consulta);
    }

    $mysqli->close();

    header("location:../views/usuarios.php");

    if ($consulta == true) {
        header("Location:../views/usuarios.php?mensaje=actualizado");
    } else {
        header("location: ../views/usuarios.php?mensaje=error");
        exit();
    }

}

function eliminar_registro() {
    include('./db.php');
    extract($_POST);
    $id = $_POST['id'];
    $consulta = "delete from usuarios where id = $id ";

    $mysqli->query($consulta);

    $mysqli->close();

    header("location: ../views/usuarios.php");
}

function acceso_user() {

    $nombre = $_POST['nombre'];
    $clave = $_POST['clave'];

    session_start();
    $_SESSION['nombre'] = $nombre;

    include('./db.php');
    if ($mysqli->connect_errno) {
        echo "Fallo al conectar a MySQL: " . $mysqli->connect_error;
    }

    $resultado = $mysqli->query("SELECT * FROM usuarios where nombre='$nombre' and clave=md5('$clave') ");
    $fila = $resultado->fetch_assoc();

    if ($fila['rol'] == 1) { //admin

        header('location:../views/usuarios.php');

    } else if ($fila['rol'] == 2) { //lector
        header('location:../views/lector.php');
    } else {

        header('location: login.php');
        session_destroy();
    }

    $mysqli->close();
}
?>