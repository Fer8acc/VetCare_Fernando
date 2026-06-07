<?php
include "verificar_sesion.php";
include "conexion.php";

$resultado = $conexion->query("SELECT * FROM mascotas ORDER BY id DESC");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>VetCare - Mascotas</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<header class="navbar">
    <div class="logo">VetCare</div>
    <nav>
        <a href="index.php">Inicio</a>
        <a href="crear_mascota.php">Agregar mascota</a>
        <a href="logout.php">Cerrar sesión</a>
    </nav>
</header>

<main class="content">
    <div class="page-title">
        <div>
            <h1>Panel de mascotas</h1>
            <p>Bienvenido, <?php echo htmlspecialchars($_SESSION["usuario"]); ?>.</p>
        </div>
        <a class="btn" href="crear_mascota.php">+ Nueva mascota</a>
    </div>

    <div class="table-card">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Especie</th>
                    <th>Raza</th>
                    <th>Edad</th>
                    <th>Propietario</th>
                    <th>Teléfono</th>
                    <th>Estado de salud</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($mascota = $resultado->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo $mascota["id"]; ?></td>
                        <td><?php echo htmlspecialchars($mascota["nombre"]); ?></td>
                        <td><?php echo htmlspecialchars($mascota["especie"]); ?></td>
                        <td><?php echo htmlspecialchars($mascota["raza"]); ?></td>
                        <td><?php echo htmlspecialchars($mascota["edad"]); ?></td>
                        <td><?php echo htmlspecialchars($mascota["propietario"]); ?></td>
                        <td><?php echo htmlspecialchars($mascota["telefono"]); ?></td>
                        <td><?php echo htmlspecialchars($mascota["estado_salud"]); ?></td>
                        <td class="actions">
                            <a class="btn small" href="editar_mascota.php?id=<?php echo $mascota["id"]; ?>">Editar</a>
                            <a class="btn small danger" href="eliminar_mascota.php?id=<?php echo $mascota["id"]; ?>" onclick="return confirm('¿Seguro que deseas eliminar esta mascota?');">Eliminar</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</main>
</body>
</html>
