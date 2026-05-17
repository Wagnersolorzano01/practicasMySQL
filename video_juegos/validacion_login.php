<?php
// Inicio sesión para guardar los datos del usuario
session_start();
include("conexion.php");

$error = '';
// Verifico si el formulario fue enviado 
// y obtengo el correo y contraseña del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $correo = trim($_POST['correo']);
    $password = $_POST['password'];
    // Verifico que los campos no estén vacíos 
    if (empty($correo) || empty($password)) {
        $error = "Todos los campos son obligatorios";
    } else {
        // Busco el usuario usando el correo ingresado
        $sql = "SELECT * FROM jugadores WHERE correo = ?";
        $stmt = $conexion->prepare($sql);
        $stmt->bind_param("s", $correo);
        $stmt->execute();
        $result = $stmt->get_result();
        // Verifico si el usuario existe
        if ($result->num_rows === 1) {
            $usuario = $result->fetch_assoc();
            // Comparo la contraseña ingresada con la guardada
            if (password_verify($password, $usuario['password'])) {
                $_SESSION['id'] = $usuario['id'];
                $_SESSION['nombre'] = $usuario['nombre'];
                $_SESSION['correo'] = $usuario['correo'];
                header("Location: perfil.php");
                exit();
            } else {
                $error = "Contraseña incorrecta";
            }
        } else {
            $error = "Usuario no encontrado ";
        }
    }
}
// Guardo los datos del usuario en la sesión
$conexion->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Iniciar Sesión - ZonaGamer</title>
    <link href="SitioFramework/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="estilos.css">
    <link rel="stylesheet"href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body>

<div class="container d-flex justify-content-center align-items-center vh-100">
    <div class="card p-4 login-card">
        <h2 class="text-center mb-4">Iniciar Sesión</h2>
        
        <?php if (!empty($error)): ?>
            <div class="alert alert-danger text-center"><?php echo $error; ?></div>
        <?php endif; ?>
        
        <form action="validacion_login.php" method="POST">
            <div class="mb-3">
                <label class="form-label">Correo electrónico</label>
                <input type="email" name="correo" class="form-control" required>
            </div>
            
            <div class="mb-3">
                <label class="form-label">Contraseña</label>
                <input type="password" name="password" class="form-control" required>
            </div>
            
            <button type="submit" class="btn btn-success w-100">Entrar</button>
        </form>
        
        <div class="text-center mt-3">
            <p class="mb-2">¿No tienes cuenta?</p>
            <a href="registro.php" class="btn btn-warning">Registrarse</a>
        </div>
    </div>
</div>

</body>
</html>