<?php
session_start();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>ZonaGamer - Call of Duty Mobile</title>

    <!-- Para los estilos y el diseño responsivo que me ofrece el framework --> 
    <link href="SitioFramework/css/bootstrap.min.css" rel="stylesheet">
    <!-- Esto ya ni es de comentarlo, pero es este link hace referencia a los estilos css que tengo. --> 
    <link rel="stylesheet" href="estilos.css">
    <link rel="stylesheet"href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body>

<!-- Este es mi barra de navegación principal así como en la tarea del semestre pasado.  --> 
<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow">

    <div class="container">
        <!--  nombre del sitio -->
        <a class="navbar-brand" href="index.php"><i class="bi bi-controller"></i> ZonaGamer</a>

        <!-- Botón hamburguesa, para el tema responsivo para los tipos de tamaño de pantalla  -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Esto es para el menú dinámico, cambia si el usuario ha iniciado sesión -->
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <!-- Esto ya es lógica de programación, no hace falta explicarla    -->
                <?php if (isset($_SESSION['id'])): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="perfil.php"><i class="bi bi-person-circle"></i> Mi Perfil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-danger" href="logout.php"><i class="bi bi-box-arrow-right"></i> Cerrar Sesión</a>
                    </li>
                <!-- Esto ya es lógica de programación, no hace falta explicarla    -->
                <?php else: ?>
                    <li class="nav-item">
                        <a class="btn btn-success px-3" href="login.php"><i class="bi bi-box-arrow-in-right"></i> Iniciar Sesión</a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-warning text-dark px-3 ms-2" href="registro.php"><i class="bi bi-person-plus-fill"></i> Registrarse</a>
                    </li>  
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>

<!--Imagen de mi sitio o como le dicen "Banner"  -->
<div class="container-fluid p-0">
    <img src="img/CODMPDP_HERO.png" class="hero-img" alt="Call of Duty Mobile" style="width: 100%;">
</div>

<!-- este es mi contenedor principal  -->
<div class="container my-5">
    <!-- Esto no creo que es necesario explicar -->
    <div class="text-center mb-5">
        <h2>¿Quiénes somos?</h2>
        <p class="mx-auto" style="max-width: 700px;">
            ZonaGamer es una comunidad para jugadores de Call of Duty Mobile. 
            Regístrate, guarda tu perfil y mantente conectado con el mundo gamer.
        </p>
    </div>

    <!-- Aquí ya implemento el framework de bootstrap ejem (contanier, card, padding y margin) --> 

    <div class="card p-4 mb-5">
        <h3 class="text-center mb-3">¿Qué es Call of Duty?</h3>
        <p class="text-center">
            Call of Duty: Mobile es un juego gratuito de disparos en primera persona para celulares 
            (iOS y Android). Fue lanzado en 2019 y tiene más de 500 millones de descargas.
        </p>
        <p class="text-center mb-0">
            Ofrece gráficos impresionantes, mapas clásicos como Nuketown y un emocionante modo 
            Battle Royale para 100 jugadores.
        </p>
    </div>

    <div class="row mb-5">
        
        <div class="col-md-6 mb-4">
            <div class="card h-100 shadow-sm">
                <div class="card-body text-center">
                    <img src="img/CodMobileMj.jpg" class="img-fluid rounded mb-3" style="max-height: 150px;">
                    <h4>Multijugador</h4>
                    <hr>
                    <p>
                        Combate clásico de Call of Duty 5v5 en equipo, con decenas de mapas y modos disponibles, 
                        incluyendo Dominio, Baja confirmada, Buscar y destruir y DPE.
                    </p>
                </div>
            </div>
        </div>

        <div class="col-md-6 mb-4">
            <div class="card h-100 shadow-sm">
                <div class="card-body text-center">
                    <img src="img/CodMobileBr.jpg" class="img-fluid rounded mb-3" style="max-height: 150px;">
                    <h4>Battle Royale</h4>
                    <hr>
                    <p>
                        Disfruta de varios mapas y modos de Battle Royale, en solitario o con un pelotón. 
                        Todos los mapas combinan entornos clásicos y originales con opciones casuales y competitivas.
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- Registro o Login -->
    <div class="text-center">
        <?php if (isset($_SESSION['id'])): ?>
            <div class="alert alert-info">
                Bienvenido, <strong><?php echo $_SESSION['nombre']; ?></strong>
                <br>
                <a href="perfil.php" class="btn btn-primary mt-2">Ir a mi perfil</a>
            </div>
        <?php else: ?>
            <div class="card p-4 shadow-sm">
                <h4>¿Listo para unirte?</h4>
                <p>Crea una cuenta o inicia sesión</p>
                <div>
                    <a class="btn btn-warning text-dark px-3 ms-2" href="registro.php"><i class="bi bi-person-plus-fill"></i> Registrarse</a>
                    <a class="btn btn-success px-3" href="login.php"><i class="bi bi-box-arrow-in-right"></i> Iniciar Sesión</a>
                </div>
            </div>
        <?php endif; ?>
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