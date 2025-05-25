<?php
require 'conexion.php';
session_start();

if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $usuario_id = $_SESSION['usuario']['id'];
    $curso_id = $_POST['curso_id'];

    // Validar que no se haya inscrito antes
    $verificacion = $conexion->prepare("SELECT * FROM inscripciones WHERE usuario_id = ? AND curso_id = ?");
    $verificacion->bind_param("ii", $usuario_id, $curso_id);
    $verificacion->execute();
    $resultado = $verificacion->get_result();

    if ($resultado->num_rows > 0) {
        echo "Ya estás inscrito en este curso.";
        exit();
    }

    $stmt = $conexion->prepare("INSERT INTO inscripciones (usuario_id, curso_id) VALUES (?, ?)");
    $stmt->bind_param("ii", $usuario_id, $curso_id);

    if ($stmt->execute()) {
        echo "¡Inscripción exitosa!";
        echo "<br><a href='cursos.php'>Volver a cursos</a>";
    } else {
        echo "Error al inscribirse: " . $stmt->error;
    }

    $stmt->close();
    $conexion->close();
}
?>

