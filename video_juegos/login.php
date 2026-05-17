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
    <title>Iniciar Sesión - ZonaGamer</title>
    <!-- Bootstrap -->
    <link href="SitioFramework/css/bootstrap.min.css" rel="stylesheet">
    <!-- Estilos propios -->
    <link rel="stylesheet" href="estilos.css">
    <link rel="stylesheet"href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body>

<div class="container d-flex justify-content-center align-items-center vh-100">
    <div class="card p-4 login-card">
    <a class="btn btn-success px-3" href="login.php"><i class="bi bi-box-arrow-in-right"></i> Iniciar Sesión</a>
        
        <form action="validacion_login.php" method="POST">
            <div class="mb-3">
                <label for="correo" class="form-label">Correo electrónico</label>
                <input type="email" name="correo" id="correo" class="form-control" placeholder="ejemplo@correo.com" required>
            </div>
            
            <div class="mb-3">
                <label for="password" class="form-label">Contraseña</label>
                <input type="password" name="password" id="password" class="form-control" placeholder="Ingrese su contraseña" required>
            </div>
            
            <button type="submit" class="btn btn-success w-100">Entrar</button>
        </form>
        
        <div class="text-center mt-3">
            <p class="mb-2">¿No tienes cuenta?</p>
            <a href="registro.php" class="btn btn-warning">Registrarse</a>
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