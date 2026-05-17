<?php
session_start();

// Si ya está logueado, redirigir al perfil
if (isset($_SESSION['id'])) {
    header("Location: perfil.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro - ZonaGamer</title>
    <!-- Bootstrap -->
    <link href="SitioFramework/css/bootstrap.min.css" rel="stylesheet">
    <!-- Estilos propios -->
    <link rel="stylesheet" href="estilos.css">
    <link rel="stylesheet"href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet"href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body>

<div class="container d-flex justify-content-center align-items-center vh-100">
    <div class="card p-4 login-card"><h2 class="text-center mb-4">
    <i class="bi bi-person-plus-fill"></i> Registro de Jugador</h2>
        
        <form action="guardar_usuario.php" method="POST">
            <div class="mb-3">
                <label for="cedula" class="form-label">Cédula</label>
                <input type="text" name="cedula" id="cedula" class="form-control" placeholder="Ingrese su cédula" required>
            </div>
            
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre completo</label>
                <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Ingrese su nombre" required>
            </div>
            
            <div class="mb-3">
                <label for="correo" class="form-label">Correo electrónico</label>
                <input type="email" name="correo" id="correo" class="form-control" placeholder="ejemplo@correo.com" required>
            </div>
            
            <div class="mb-3">
                <label for="password" class="form-label">Contraseña</label>
                <input type="password" name="password" id="password" class="form-control" placeholder="Mínimo 6 caracteres" required>
            </div>
            
            <button type="submit" class="btn btn-warning w-100">Registrarse</button>
        </form>
        
        <div class="text-center mt-3">
            <p class="mb-2">¿Ya tienes cuenta?</p>
            <a href="login.php" class="btn btn-success">Iniciar Sesión</a>
        </div>
    </div>
</div>
<!-- Pie de Página -->
<footer class="text-center py-3 mt-5 bg-dark text-white">
    <div class="container">
        <p class="mb-0">
    <i class="bi bi-controller"></i> ZonaGamer - Comunidad de Call of Duty Mobile</p>
    </div>
</footer>

<script src="SitioFramework/js/bootstrap.bundle.min.js"></script>

</body>
</html>