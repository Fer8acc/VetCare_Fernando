<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>VetCare - Inicio</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<header class="navbar">
    <div class="logo">VetCare</div>
    <nav>
        <a href="index.php">Inicio</a>
        <?php if (isset($_SESSION["usuario_id"])): ?>
            <a href="mascotas.php">Mascotas</a>
            <a href="logout.php">Cerrar sesión</a>
        <?php else: ?>
            <a href="login.php">Login</a>
            <a href="registro.php">Registro</a>
        <?php endif; ?>
    </nav>
</header>

<section class="hero">
    <div class="hero-text">
        <h1>Sistema de gestión veterinaria</h1>
        <p>Administra mascotas, propietarios y datos básicos de salud de una forma sencilla, rápida y segura.</p>
        <?php if (isset($_SESSION["usuario_id"])): ?>
            <a class="btn" href="mascotas.php">Ir al panel</a>
        <?php else: ?>
            <a class="btn" href="registro.php">Crear cuenta</a>
        <?php endif; ?>
    </div>
</section>

<section class="cards">
    <div class="card">
        <h3>Registro de mascotas</h3>
        <p>Guarda nombre, especie, raza, edad y propietario.</p>
    </div>
    <div class="card">
        <h3>CRUD completo</h3>
        <p>Crea, consulta, edita y elimina registros desde el panel.</p>
    </div>
    <div class="card">
        <h3>Acceso protegido</h3>
        <p>Solo usuarios registrados pueden entrar al módulo administrativo.</p>
    </div>
</section>

<footer>
    <p>Proyecto escolar - Fernando Ochoa Castro - Grupo 2-2</p>
</footer>
</body>
</html>
