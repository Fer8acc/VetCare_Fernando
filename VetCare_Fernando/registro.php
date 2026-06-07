<?php
session_start();
include "conexion.php";

$mensaje = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nombre = trim($_POST["nombre"]);
    $correo = trim($_POST["correo"]);
    $password = $_POST["password"];

    if ($nombre === "" || $correo === "" || $password === "") {
        $mensaje = "Todos los campos son obligatorios.";
    } else {
        $password_hash = password_hash($password, PASSWORD_DEFAULT);

        $stmt = $conexion->prepare("INSERT INTO usuarios (nombre, correo, password) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $nombre, $correo, $password_hash);

        if ($stmt->execute()) {
            header("Location: login.php?registro=ok");
            exit();
        } else {
            $mensaje = "No se pudo registrar. Puede que el correo ya exista.";
        }

        $stmt->close();
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>VetCare - Registro</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<header class="navbar">
    <div class="logo">VetCare</div>
    <nav>
        <a href="index.php">Inicio</a>
        <a href="login.php">Login</a>
    </nav>
</header>

<main class="form-container">
    <form method="POST" class="form-card">
        <h2>Crear cuenta</h2>

        <?php if ($mensaje !== ""): ?>
            <p class="alert error"><?php echo htmlspecialchars($mensaje); ?></p>
        <?php endif; ?>

        <label>Nombre completo</label>
        <input type="text" name="nombre" required>

        <label>Correo electrónico</label>
        <input type="email" name="correo" required>

        <label>Contraseña</label>
        <input type="password" name="password" required>

        <button type="submit" class="btn full">Registrarme</button>
        <p class="center">¿Ya tienes cuenta? <a href="login.php">Inicia sesión</a></p>
    </form>
</main>
</body>
</html>
