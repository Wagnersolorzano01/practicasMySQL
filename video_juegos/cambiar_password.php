<?php
session_start();

if (!isset($_SESSION['id'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Cambiar Contraseña - ZonaGamer</title>
    <link href="SitioFramework/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="estilos.css">
    <link rel="stylesheet"href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="index.php">ZonaGamer</a>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="perfil.php">Volver al Perfil</a></li>
                <li class="nav-item"><a class="nav-link text-danger" href="logout.php">Cerrar Sesión</a></li>
            </ul>
        </div>
    </div>
</nav>

<div class="container d-flex justify-content-center align-items-center" style="min-height: 80vh;">
    <div class="card p-4" style="max-width: 450px; width: 100%;">
        <h2 class="text-center mb-4"><i class="bi bi-shield-lock-fill"></i> Cambiar Contraseña</h2>
        
        <form action="actualizar_password.php" method="POST">
            <div class="mb-3">
                <label class="form-label">Contraseña actual</label>
                <input type="password" name="actual" class="form-control" required>
            </div>
            
            <div class="mb-3">
                <label class="form-label">Nueva contraseña</label>
                <input type="password" name="nueva" class="form-control" placeholder="Mínimo 6 caracteres" required>
            </div>
            
            <div class="mb-3">
                <label class="form-label">Confirmar contraseña</label>
                <input type="password" name="confirmar" class="form-control" required>
            </div>
            
            <button type="submit" class="btn btn-warning w-100">Actualizar contraseña</button>
        </form>
        
        <div class="text-center mt-3">
            <a href="perfil.php" class="btn btn-secondary">Cancelar</a>
        </div>
    </div>
</div>

<footer class="text-center py-3 mt-5 bg-dark text-white">
    <div class="container">
        <p class="mb-0">ZonaGamer - Comunidad Call of Duty Mobile</p>
    </div>
</footer>

</body>
</html>