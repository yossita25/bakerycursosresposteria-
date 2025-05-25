<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro - Bakery</title>
    <link rel="stylesheet" href="css/estilos.css">
</head>
<body>
    <h1>Registro en Bakery Sweet Cake</h1>
    <form action="procesar_registro.php" method="post">
        <label>Nombre:</label>
        <input type="text" name="nombre" required>
        
        <label>Apellidos:</label>
        <input type="text" name="apellidos" required>
        
        <label>Email:</label>
        <input type="email" name="email" required>

        <label>Teléfono:</label>
        <input type="text" name="telefono">

        <label>Dirección:</label>
        <input type="text" name="direccion">

        <label>Usuario:</label>
        <input type="text" name="usuario" required>

        <label>Contraseña:</label>
        <input type="password" name="contrasena" required>

        <input type="submit" value="Registrarme">
    </form>
</body>
</html>
