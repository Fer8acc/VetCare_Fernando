<?php
include "verificar_sesion.php";
include "conexion.php";

if (isset($_GET["id"])) {
    $id = intval($_GET["id"]);
    $stmt = $conexion->prepare("DELETE FROM mascotas WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->close();
}

header("Location: mascotas.php");
exit();
?>
