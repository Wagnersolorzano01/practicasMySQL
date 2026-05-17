<?php
session_start();
include("conexion.php");
// Verifico que el usuario tenga sesión activa
if (!isset($_SESSION['id'])) {
    header("Location: login.php");
    exit();
}
// Obtengo el id del usuario 
$id = $_SESSION['id'];

// Obtengo los nuevos datos del formulario
$nombre = trim($_POST['nombre']);
$correo = trim($_POST['correo']);

// Verifico que los campos no estén vacíos.
if (empty($nombre) || empty($correo)) {
    die("Todos los campos son obligatorios");
}
// Valido el formato del correo 
if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
    die("Correo inválido");
}

/* Verifico que el  correo no esté repetido */
$sql = "SELECT id FROM jugadores WHERE correo = ? AND id != ?";
$stmt = $conexion->prepare($sql);
$stmt->bind_param("si", $correo, $id);
$stmt->execute();

$resultado = $stmt->get_result();

if ($resultado->num_rows > 0) {
    die("Este correo ya está registrado");
}

// Actualizo los datos del jugador 
$sql = "UPDATE jugadores SET nombre = ?, correo = ? WHERE id = ?";
$stmt = $conexion->prepare($sql);
$stmt->bind_param("ssi", $nombre, $correo, $id);

if ($stmt->execute()) {

    /* Actualizar sesión */
    $_SESSION['nombre'] = $nombre;
    $_SESSION['correo'] = $correo;

    header("Location: perfil.php");
    exit();

} else {
    echo "Error al actualizar";
}

$conexion->close();
?>