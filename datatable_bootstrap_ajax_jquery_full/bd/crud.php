<?php
// header('Content-Type: application/json');

$conexion = include("../bd/conexion.php");

$username = (isset($_REQUEST['username'])) ? $_REQUEST['username'] : '';
$first_name = (isset($_REQUEST['first_name'])) ? $_REQUEST['first_name'] : '';
$last_name = (isset($_REQUEST['last_name'])) ? $_REQUEST['last_name'] : '';
$gender = (isset($_REQUEST['gender'])) ? $_REQUEST['gender'] : '';
$password = (isset($_REQUEST['password'])) ? $_REQUEST['password'] : '';
$status = (isset($_REQUEST['status'])) ? $_REQUEST['status'] : '';

$opcion = (isset($_REQUEST['opcion'])) ? $_REQUEST['opcion'] : '';
$user_id = (isset($_REQUEST['user_id'])) ? $_REQUEST['user_id'] : '';


switch($opcion){
    case 1: //Agregar Uusarios
        $consulta = $mysqli->query("INSERT INTO usuarios (username, first_name, last_name, gender, password, status) VALUES('$_REQUEST[username]', '$_REQUEST[first_name]', '$_REQUEST[last_name]', '$_REQUEST[gender]', MD5('$_REQUEST[password]'), '$_REQUEST[status]') ");			
        $resultado = $conexion->prepare($consulta);
        $resultado->execute(); 
        // $data = mysqli_fetch_all($consulta, MYSQLI_ASSOC); 
        
        $consulta = $mysqli->query("SELECT * FROM usuarios ORDER BY user_id DESC LIMIT 1");
        $data = mysqli_fetch_all($consulta, MYSQLI_ASSOC);       
        break;    
    case 2: //Actualizar Usuario        
        $consulta = $mysqli->query("UPDATE usuarios SET username='$username', first_name='$first_name', last_name='$last_name', gender='$gender', password=MD5('$password'), status='$status' WHERE user_id='$user_id' ");		
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();        
        
        $consulta = $mysqli->query("SELECT * FROM usuarios WHERE user_id='$user_id' ");       
        $data = mysqli_fetch_all($consulta, MYSQLI_ASSOC);
        break;
    case 3: //Eliminar Usuarios
        $consulta = $mysqli->query("DELETE FROM usuarios WHERE user_id='$user_id' ");		
        $resultado = $conexion->prepare($onsulta);
        $resultado->execute();                           
        break;
    case 4: //Listar Usuarios
        $consulta = $mysqli->query("select * from usuarios");      
        $data = mysqli_fetch_all($consulta, MYSQLI_ASSOC);
        break;

}

print json_encode($data, JSON_UNESCAPED_UNICODE);//envio el array final el formato json a AJAX
$conexion=null;