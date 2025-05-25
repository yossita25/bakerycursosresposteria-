<?php
require_once 'conexion.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    $email = $_POST['email'];
    $telefono = $_POST['telefono'];
    $direccion = $_POST['direccion'];
    $usuario = $_POST['usuario'];
    $contrasena = password_hash($_POST['contrasena'], PASSWORD_BCRYPT);

    $sql = "INSERT INTO usuarios (nombre, apellidos, email, telefono, direccion, usuario, contrasena)
            VALUES (?, ?, ?, ?, ?, ?, ?)";

    // Preparar sentencia
    $stmt = $conexion->prepare($sql);

    // Verificar si la preparación fue exitosa
    if ($stmt === false) {
        die("Error al preparar la consulta: " . $conexion->error);
    }

    // Vincular parámetros (7 cadenas: "sssssss")
    $stmt->bind_param("sssssss", $nombre, $apellidos, $email, $telefono, $direccion, $usuario, $contrasena);

    // Ejecutar y verificar éxito
    if ($stmt->execute()) {
        header("Location: login.php");
        exit();
    } else {
        echo "Error al registrar: " . $stmt->error;
    }

    $stmt->close();
    $conexion->close();
}
?>
