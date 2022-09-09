<?php
$host = "localhost";
$user = "root";
$password = "";
$database = "registro_usuarios";

$mysqli = new mysqli($host, $user, $password, $database);
    if ($mysqli->connect_errno) {
        echo "Falló al conectar a MySQL: " . $mysqli->connect_error;
    }

?>