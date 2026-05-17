<?php
session_start();
// Verifico que el usuario inició sesión
if (!isset($_SESSION['id'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Mi Perfil - ZonaGamer</title>

    <!-- Bootstrap -->
    <link href="SitioFramework/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- Estilos CSS -->
    <link rel="stylesheet" href="estilos.css">
</head>
<body>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow">
    <div class="container">
        <a class="navbar-brand" href="index.php">
            <i class="bi bi-controller"></i> ZonaGamer
        </a>

        <div class="collapse navbar-collapse">
            <ul class="navbar-nav ms-auto">

                <li class="nav-item">
                    <a class="nav-link" href="index.php">
                        <i class="bi bi-house-fill"></i> Inicio
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link text-danger" href="logout.php">
                        <i class="bi bi-box-arrow-right"></i> Cerrar Sesión
                    </a>
                </li>

            </ul>
        </div>
    </div>
</nav>

<!-- Contenido -->
<div class="container mt-5">

    <!-- Card principal del perfil -->
    <div class="card perfil-card p-4">

        <!-- Aquí muestro los datos del usuario que inició sesión -->
        <div class="text-center mb-4">
            <i class="bi bi-person-circle perfil-icono"></i>

            <h2 class="mt-3">
                <?php echo $_SESSION['nombre']; ?>
            </h2>

            <p class="text-muted">
                <i class="bi bi-envelope-fill"></i>
                <?php echo $_SESSION['correo']; ?>
            </p>
        </div>

        <!-- Mensaje de sesión iniciada -->
        <div class="alert alert-success text-center">
            <i class="bi bi-check-circle-fill"></i>
            Sesión iniciada correctamente
        </div>
        <!-- Información gamer personalizada -->
        <!-- Perfil del jugador Personal que no se vea con poca información. -->
<h4 class="mb-4">
    <i class="bi bi-person-vcard-fill"></i>
    Perfil del Jugador 
</h4>

<div class="row">

    <div class="col-md-6 mb-3">
        <div class="card info-card p-3 h-100">
            <h5>
                <i class="bi bi-crosshair2"></i>
                Rol del jugador
            </h5>

            <p class="mb-0">
                Jugador agresivo de primera línea 
                (Entry Fragger / Slayer) especializado 
                en escopeta y presión ofensiva.
            </p>
        </div>
    </div>

    <div class="col-md-6 mb-3">
        <div class="card info-card p-3 h-100">
            <h5>
                <i class="bi bi-controller"></i>
                Modo Favorito
            </h5>

            <p class="mb-0">
                Battle Royale Isolated
            </p>
        </div>
    </div>

    <div class="col-md-6 mb-3">
        <div class="card info-card p-3 h-100">
            <h5>
                <i class="bi bi-globe-americas"></i>
                Región del Juego
            </h5>

            <p class="mb-0">
                Servidor EEUU
            </p>
        </div>
    </div>

    <div class="col-md-6 mb-3">
        <div class="card info-card p-3 h-100">
            <h5>
                <i class="bi bi-shield-fill"></i>
                Arma por Clasificación
            </h5>

            <p class="mb-0">
                Escopeta BY15
            </p>
        </div>
    </div>

    <div class="col-md-6 mb-3">
        <div class="card info-card p-3 h-100">
            <h5>
                <i class="bi bi-trophy-fill"></i>
                Victorias
            </h5>

            <p class="mb-0">
                4084
            </p>
        </div>
    </div>

    <div class="col-md-6 mb-3">
        <div class="card info-card p-3 h-100">
            <h5>
                <i class="bi bi-bullseye"></i>
                Número de Bajas
            </h5>

            <p class="mb-0">
                74314
            </p>
        </div>
    </div>

    <div class="col-md-6 mb-3">
        <div class="card info-card p-3 h-100">
            <h5>
                <i class="bi bi-lightning-charge-fill"></i>
                Promedio de Daño
            </h5>

            <p class="mb-0">
                4084
            </p>
        </div>
    </div>

    <div class="col-md-6 mb-3">
        <div class="card info-card p-3 h-100">
            <h5>
                <i class="bi bi-star-fill"></i>
                MVP
            </h5>

            <p class="mb-0">
                6524
            </p>
        </div>
    </div>

</div>

        <!-- Botones -->
        <div class="d-grid gap-2 mt-4">

            <a href="cambiar_password.php" class="btn btn-warning">
                <i class="bi bi-shield-lock-fill"></i>
                Cambiar contraseña
            </a>

            <a href="logout.php" class="btn btn-danger">
                <i class="bi bi-box-arrow-right"></i>
                Cerrar sesión
            </a>

        </div>

    </div>
</div>

<!-- Pie de página -->
<footer class="text-center py-3 mt-5 bg-dark text-white">
    <div class="container">
        <p class="mb-0">
            <i class="bi bi-controller"></i>
            ZonaGamer - Comunidad Call of Duty Mobile
        </p>
    </div>
</footer>

<script src="SitioFramework/js/bootstrap.bundle.min.js"></script>

</body>
</html>