<?php
require_once 'conexion.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $usuario = $_POST['usuario'];
    $contrasena = $_POST['contrasena'];

    $stmt = $conexion->prepare("SELECT * FROM usuarios WHERE usuario = ?");
    $stmt->bind_param("s", $usuario);
    $stmt->execute();

    $resultado = $stmt->get_result();
    $usuarioEncontrado = $resultado->fetch_assoc();

    if ($usuarioEncontrado && password_verify($contrasena, $usuarioEncontrado['contrasena'])) {
        $_SESSION['usuario'] = [
            'id' => $usuarioEncontrado['id'],
            'nombre' => $usuarioEncontrado['nombre'],
            'usuario' => $usuarioEncontrado['usuario']
        ];

        header("Location: dashboard.php");
        exit();
    } else {
        echo "Credenciales incorrectas.";
    }

    $stmt->close();
    $conexion->close();
}
?>
