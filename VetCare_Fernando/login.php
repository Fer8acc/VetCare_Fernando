<?php
session_start();
include "conexion.php";

$mensaje = "";

if (isset($_GET["registro"])) {
    $mensaje = "Registro exitoso. Ahora inicia sesión.";
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $correo = trim($_POST["correo"]);
    $password = $_POST["password"];

    $stmt = $conexion->prepare("SELECT id, nombre, correo, password FROM usuarios WHERE correo = ?");
    $stmt->bind_param("s", $correo);
    $stmt->execute();

    $resultado = $stmt->get_result();

    if ($resultado->num_rows === 1) {
        $usuario = $resultado->fetch_assoc();

        if (password_verify($password, $usuario["password"])) {
            $_SESSION["usuario_id"] = $usuario["id"];
            $_SESSION["usuario"] = $usuario["nombre"];
            header("Location: mascotas.php");
            exit();
        } else {
            $mensaje = "Contraseña incorrecta.";
        }
    } else {
        $mensaje = "No existe una cuenta con ese correo.";
    }

    $stmt->close();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>VetCare - Login</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<header class="navbar">
    <div class="logo">VetCare</div>
    <nav>
        <a href="index.php">Inicio</a>
        <a href="registro.php">Registro</a>
    </nav>
</header>

<main class="form-container">
    <form method="POST" class="form-card">
        <h2>Iniciar sesión</h2>

        <?php if ($mensaje !== ""): ?>
            <p class="alert"><?php echo htmlspecialchars($mensaje); ?></p>
        <?php endif; ?>

        <label>Correo electrónico</label>
        <input type="email" name="correo" required>

        <label>Contraseña</label>
        <input type="password" name="password" required>

        <button type="submit" class="btn full">Entrar</button>
        <p class="center">¿No tienes cuenta? <a href="registro.php">Regístrate</a></p>
    </form>
</main>
</body>
</html>
