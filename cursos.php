<?php
session_start();
require_once 'conexion.php';

if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit();
}

// Obtener cursos
$sql = "SELECT * FROM cursos";
$resultado = $conexion->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Cursos de Repostería</title>
    <link rel="stylesheet" href="css/estilos.css">
    <style>
        body {
            background-color: #fff8f0;
            font-family: 'Segoe UI', sans-serif;
            margin: 0;
            padding: 0;
        }
        h1 {
            text-align: center;
            color: #d2691e;
            margin-top: 30px;
        }
        .contenedor {
            max-width: 1200px;
            margin: 30px auto;
            padding: 0 20px;
        }
        .cursos-grid {
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 30px;
        }
        .curso {
            background-color: #fff2e6;
            border: 1px solid #f0d5be;
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            padding: 20px;
            width: calc(33.33% - 20px);
            display: flex;
            flex-direction: column;
            align-items: center;
            transition: transform 0.2s;
            box-sizing: border-box;
        }
        .curso:hover {
            transform: translateY(-5px);
        }
        .curso img {
            width: 100%;
            height: 180px;
            object-fit: cover;
            border-radius: 10px;
            margin-bottom: 15px;
        }
        .curso h3 {
            color: #d2691e;
            font-size: 20px;
            margin: 10px 0 5px;
            text-align: center;
        }
        .curso p {
            font-size: 14px;
            color: #555;
            margin: 5px 0;
            text-align: center;
        }
        .boton-inscribirse {
            margin-top: 10px;
            background-color: #d2691e;
            color: white;
            padding: 5px 10px;
            border-radius: 8px;
            text-decoration: none;
            border: none;
            font-size: 14px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .boton-inscribirse:hover {
            background-color: #b85c1d;
        }

        @media (max-width: 1000px) {
            .curso {
                width: 100%;
            }
        }
    </style>
</head>
<body>

<div class="contenedor">
    <h1>🍰 Cursos de Repostería Creativa</h1>
    <div class="cursos-grid">
        <?php
        $contador = 1;
        while ($curso = $resultado->fetch_assoc()):
        ?>
            <div class="curso">
                <img src="imagenes/cake<?= $contador ?>.jpg" alt="Curso de repostería">
                <h3><?= htmlspecialchars($curso['nombre']) ?></h3>
                <p><?= htmlspecialchars($curso['descripcion']) ?></p>
                <p><strong>Fecha de inicio:</strong> <?= htmlspecialchars($curso['fecha_inicio']) ?></p>
                <p><strong>Cupo:</strong> <?= htmlspecialchars($curso['cupo']) ?></p>

                <form action="inscribirse.php" method="post">
                    <input type="hidden" name="curso_id" value="<?= $curso['id'] ?>">
                    <input type="submit" class="boton-inscribirse" value="Inscribirme">
                </form>
            </div>
        <?php 
        $contador++;
        endwhile; 
        ?>
    </div>
</div>

</body>
</html>
