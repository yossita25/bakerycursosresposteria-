<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Login - Bakery</title>
    <link rel="stylesheet" href="css/estilos.css">
</head>
<body>
    <h1>Iniciar sesión</h1>
    <form action="procesar_login.php" method="post">
        <label>Usuario:</label>
        <input type="text" name="usuario" required>
        
        <label>Contraseña:</label>
        <input type="password" name="contrasena" required>

        <input type="submit" value="Entrar">
    </form>
</body>
</html>
