<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Panel de Usuario</title>
    <link rel="stylesheet" href="css/estilos.css">
</head>
<body>

    <h1 style="text-align:center; color:#d2691e;">🍰 Bienvenido a Bakery Sweet Cake 🍰</h1>

    <div style="text-align:center; margin-top:20px;">
    
        <h2>Hola, <?php echo $_SESSION['usuario']['nombre']; ?> 👋</h2>
        <p>Gracias por iniciar sesión. Esperamos que disfrutes nuestros productos.</p>
        <img src="imagenes/cake1.jpg" alt="Tarta deliciosa" style="width:300px; border-radius:10px;">
        <br><br>
        <a href="inscribirse.php" style="display:inline-block; background:#d2691e; color:white; padding:10px 20px; border-radius:5px; margin-top:15px;">Inscribirme al curso</a>
        <a href="cursos.php" style="display:inline-block; margin-top:10px; padding:10px; background:#d2691e; color:white; border-radius:5px;">Ver Cursos Disponibles</a>
        <a href="logout.php">Cerrar sesión</a>
        
    </div>
    <div style="display: flex; gap: 10px; flex-wrap: wrap; justify-content: center;">
    <?php for ($i = 1; $i <= 3; $i++): ?>
        <img src="imagenes/cake<?= $i ?>.jpg" alt="Cake <?= $i ?>" style="width: 25%; height: 25%; border-radius: 10px; Margin-top: 10px;">
    <?php endfor; ?>
</div>


</body>
</html>
