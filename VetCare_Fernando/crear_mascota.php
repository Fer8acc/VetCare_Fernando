<?php
include "verificar_sesion.php";
include "conexion.php";

$mensaje = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nombre = trim($_POST["nombre"]);
    $especie = trim($_POST["especie"]);
    $raza = trim($_POST["raza"]);
    $edad = intval($_POST["edad"]);
    $propietario = trim($_POST["propietario"]);
    $telefono = trim($_POST["telefono"]);
    $estado_salud = trim($_POST["estado_salud"]);

    if ($nombre === "" || $especie === "" || $propietario === "") {
        $mensaje = "Nombre, especie y propietario son obligatorios.";
    } else {
        $stmt = $conexion->prepare("INSERT INTO mascotas (nombre, especie, raza, edad, propietario, telefono, estado_salud) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssisss", $nombre, $especie, $raza, $edad, $propietario, $telefono, $estado_salud);

        if ($stmt->execute()) {
            header("Location: mascotas.php");
            exit();
        } else {
            $mensaje = "Error al guardar la mascota.";
        }

        $stmt->close();
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>VetCare - Agregar mascota</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<header class="navbar">
    <div class="logo">VetCare</div>
    <nav>
        <a href="mascotas.php">Volver</a>
        <a href="logout.php">Cerrar sesión</a>
    </nav>
</header>

<main class="form-container">
    <form method="POST" class="form-card wide">
        <h2>Agregar mascota</h2>

        <?php if ($mensaje !== ""): ?>
            <p class="alert error"><?php echo htmlspecialchars($mensaje); ?></p>
        <?php endif; ?>

        <label>Nombre de la mascota</label>
        <input type="text" name="nombre" required>

        <label>Especie</label>
        <input type="text" name="especie" placeholder="Perro, gato, conejo..." required>

        <label>Raza</label>
        <input type="text" name="raza">

        <label>Edad</label>
        <input type="number" name="edad" min="0" value="0">

        <label>Propietario</label>
        <input type="text" name="propietario" required>

        <label>Teléfono</label>
        <input type="text" name="telefono">

        <label>Estado de salud</label>
        <textarea name="estado_salud" rows="4" placeholder="Ejemplo: Vacunado, revisión pendiente, alergias..."></textarea>

        <button type="submit" class="btn full">Guardar</button>
    </form>
</main>
</body>
</html>
