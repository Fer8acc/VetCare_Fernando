<?php
include "verificar_sesion.php";
include "conexion.php";

if (!isset($_GET["id"])) {
    header("Location: mascotas.php");
    exit();
}

$id = intval($_GET["id"]);
$mensaje = "";

$stmt = $conexion->prepare("SELECT * FROM mascotas WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$resultado = $stmt->get_result();

if ($resultado->num_rows !== 1) {
    header("Location: mascotas.php");
    exit();
}

$mascota = $resultado->fetch_assoc();
$stmt->close();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nombre = trim($_POST["nombre"]);
    $especie = trim($_POST["especie"]);
    $raza = trim($_POST["raza"]);
    $edad = intval($_POST["edad"]);
    $propietario = trim($_POST["propietario"]);
    $telefono = trim($_POST["telefono"]);
    $estado_salud = trim($_POST["estado_salud"]);

    $stmt = $conexion->prepare("UPDATE mascotas SET nombre = ?, especie = ?, raza = ?, edad = ?, propietario = ?, telefono = ?, estado_salud = ? WHERE id = ?");
    $stmt->bind_param("sssisssi", $nombre, $especie, $raza, $edad, $propietario, $telefono, $estado_salud, $id);

    if ($stmt->execute()) {
        header("Location: mascotas.php");
        exit();
    } else {
        $mensaje = "Error al actualizar la mascota.";
    }

    $stmt->close();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>VetCare - Editar mascota</title>
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
        <h2>Editar mascota</h2>

        <?php if ($mensaje !== ""): ?>
            <p class="alert error"><?php echo htmlspecialchars($mensaje); ?></p>
        <?php endif; ?>

        <label>Nombre de la mascota</label>
        <input type="text" name="nombre" value="<?php echo htmlspecialchars($mascota["nombre"]); ?>" required>

        <label>Especie</label>
        <input type="text" name="especie" value="<?php echo htmlspecialchars($mascota["especie"]); ?>" required>

        <label>Raza</label>
        <input type="text" name="raza" value="<?php echo htmlspecialchars($mascota["raza"]); ?>">

        <label>Edad</label>
        <input type="number" name="edad" min="0" value="<?php echo htmlspecialchars($mascota["edad"]); ?>">

        <label>Propietario</label>
        <input type="text" name="propietario" value="<?php echo htmlspecialchars($mascota["propietario"]); ?>" required>

        <label>Teléfono</label>
        <input type="text" name="telefono" value="<?php echo htmlspecialchars($mascota["telefono"]); ?>">

        <label>Estado de salud</label>
        <textarea name="estado_salud" rows="4"><?php echo htmlspecialchars($mascota["estado_salud"]); ?></textarea>

        <button type="submit" class="btn full">Actualizar</button>
    </form>
</main>
</body>
</html>
