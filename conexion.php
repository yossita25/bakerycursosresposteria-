<?php
$host = "localhost";
$usuario = "root";
$contrasena = "";
$basededatos = "bakerydb2";

$conexion = new mysqli($host, $usuario, $contrasena, $basededatos);

if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}
?>
