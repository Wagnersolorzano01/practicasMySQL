<?php
// Datos de conexión con MSQL
$host = "localhost";
$user = "root";
$password = "";
$base_datos = "usuarios"; 

// Creo la conexión con MSQL
$conexion = new mysqli($host, $user, $password, $base_datos);

// Verifico si existe error de conexión
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}
?>