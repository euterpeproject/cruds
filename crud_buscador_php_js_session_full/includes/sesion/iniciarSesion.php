<?php
session_start();
error_reporting(0);

$validar = $_SESSION['nombre'];

if ($validar == null || $validar = '') {
    header("location:../login.php");
    die();
}

?>