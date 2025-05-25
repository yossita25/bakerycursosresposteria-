<?php
session_start();
require_once 'conexion.php';

$mensaje = '';  // Inicializamos la variable

if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $usuario_id = $_SESSION['usuario']['id'];
    $curso_id = $_POST['curso_id'];

    // Insertar inscripción
    $sql = "INSERT INTO inscripciones (usuario_id, curso_id) VALUES (?, ?)";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("ii", $usuario_id, $curso_id);

    if ($stmt->execute()) {
        $mensaje = "¡Inscripción realizada con éxito!";
    } else {
        $mensaje = "Error al inscribirse: " . $stmt->error;
    }

    $stmt->close();
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Inscribirse al Curso</title>
    <link rel="stylesheet" href="css/estilos.css">
    <style>
        body {
            background-color: #fff8f0;
            font-family: 'Segoe UI', sans-serif;
            margin: 0;
            padding: 20px;
            text-align: center;
        }
        .boton-regresar {
            display: inline-block;
            margin-top: 20px;
            padding: 12px 25px;
            background-color: #d2691e;
            color: white;
            border-radius: 8px;
            text-decoration: none;
            font-weight: bold;
        }
        .boton-regresar:hover {
            background-color: #b85c1d;
        }
    </style>
</head>
<body>

    <?php if (!empty($mensaje)): ?>
        <div style="
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
            padding: 15px;
            margin: 20px auto;
            max-width: 500px;
            border-radius: 5px;
            font-weight: bold;
        ">
            <?= htmlspecialchars($mensaje) ?>
        </div>
    <?php endif; ?>

    <a href="cursos.php" class="boton-regresar">← Ver más cursos</a>
    <br><br>
    <a href="index.php" class="boton-regresar">🏠 Volver al inicio</a>

</body>
</html>
