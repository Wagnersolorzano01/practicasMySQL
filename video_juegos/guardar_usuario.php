<?php
// Inicio sesión para manejar los datos del usuario
session_start();

// Si ya inició sesión lo mando al perfil
if (isset($_SESSION['id'])) {
    header("Location: perfil.php");
    exit();
}

// Inicializar variables
$cedula = '';
$nombre = '';
$correo = '';
$error = '';

// Obtengo los datos ingresados por el usuario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include("conexion.php");
    
    $cedula = trim($_POST['cedula']);
    $nombre = trim($_POST['nombre']);
    $correo = trim($_POST['correo']);
    $password = $_POST['password'];


    
    // Verifico que los campos no estén vacíos
    if (empty($cedula) || empty($nombre) || empty($correo) || empty($password)) {
        $error = "Todos los campos son obligatorios";
    }
    // Valido que la cédula solo tenga números 
    elseif (!ctype_digit($cedula)) {
        $error = "La cédula solo debe contener números ";
    }
    // Valido el tamaño o longitud de la cédula
    elseif (strlen($cedula) < 8 || strlen($cedula) > 10) {
        $error = "¡ La cédula debe tener entre 8 y 10 dígitos :/ :/ !";
    }
    // Valido que el nombre solo contenga letras 
    elseif (!preg_match("/^[a-zA-ZáéíóúñÑÁÉÍÓÚ\s]+$/", $nombre)) {
        $error = "El nombre no debe contener números :/ ";
    }
    // Valido el tamaño o longitud del nombre
    elseif (strlen($nombre) < 3) {
        $error = ":/ ¡ El nombre debe tener al menos 3 caracteres !";
    }
    // Verifico que el correo tengo un fomrato válido
    elseif (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
        $error = ":7 ¡ El correo electrónico no es válido !";
    }
    // Valido la longitud de la  contraseña
    elseif (strlen($password) < 6) {
        $error = "*_* ¡ La contraseña debe tener al menos 6 caracteres !";
    }
    else {
        // Verifico que el correo no esté duplicado
        $sql = "SELECT id FROM jugadores WHERE correo = ?";
        $stmt = $conexion->prepare($sql);
        $stmt->bind_param("s", $correo);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($result->num_rows > 0) {
            $error = ":/ ¡ Este correo ya está registrado !";
        } else {
            // Verifico que la cédula no esté duplicada
            $sql = "SELECT id FROM jugadores WHERE cedula = ?";
            $stmt = $conexion->prepare($sql);
            $stmt->bind_param("s", $cedula);
            $stmt->execute();
            $result = $stmt->get_result();
            
            if ($result->num_rows > 0) {
                $error = "¡ Esta cédula ya está registrada !";
            } else {
                // Encripto la contaseña para mayor seguridad
                $passwordHash = password_hash($password, PASSWORD_DEFAULT);
                
                // Inserto el nuevoi usuario en la base de datos 
                $sql = "INSERT INTO jugadores (cedula, nombre, correo, password) VALUES (?, ?, ?, ?)";
                $stmt = $conexion->prepare($sql);
                $stmt->bind_param("ssss", $cedula, $nombre, $correo, $passwordHash);
                
                if ($stmt->execute()) {
                    // Redirigir al login si el registro es exitoso
                    header("Location: login.php");
                    exit();
                } else {
                    $error = "¡ Error de Ingreso !, ¡ intente nuevamente !";
                }
            }
        }
    }
    $stmt->close(); // Con esto cierro la consulta que realizo con el query 
    $conexion->close(); // En cambio con esto cierro la conexión completa con MSQL 
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro - ZonaGamer</title>
    <link href="SitioFramework/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="estilos.css">
    <link rel="stylesheet"href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body>

<div class="container d-flex justify-content-center align-items-center vh-100">
    <div class="card p-4 login-card">
        <h2 class="text-center mb-4">Registro de Jugador</h2>
        
        <!-- Mostrar error si existe -->
        <?php if (!empty($error)): ?>
            <div class="alert alert-danger text-center">
                <?php echo $error; ?>
            </div>
        <?php endif; ?>
        
        <form action="guardar_usuario.php" method="POST">
            <div class="mb-3">
                <label class="form-label">Cédula</label>
                <input type="text" name="cedula" class="form-control" 
                       value="<?php echo htmlspecialchars($cedula); ?>"
                       placeholder="Ingrese su cédula" required>
            </div>
            
            <div class="mb-3">
                <label class="form-label">Nombre completo</label>
                <input type="text" name="nombre" class="form-control" 
                       value="<?php echo htmlspecialchars($nombre); ?>"
                       placeholder="Ingrese su nombre" required>
            </div>
            
            <div class="mb-3">
                <label class="form-label">Correo electrónico</label>
                <input type="email" name="correo" class="form-control" 
                       value="<?php echo htmlspecialchars($correo); ?>"
                       placeholder="ejemplo@correo.com" required>
            </div>
            
            <div class="mb-3">
                <label class="form-label">Contraseña</label>
                <input type="password" name="password" class="form-control" 
                       placeholder="Mínimo 6 caracteres" required>
            </div>
            
            <button type="submit" class="btn btn-warning w-100">Registrarse</button>
        </form>
        
        <div class="text-center mt-3">
            <p class="mb-2">¿Ya tienes cuenta?</p>
            <a href="login.php" class="btn btn-success">Iniciar Sesión</a>
        </div>
    </div>
</div>

</body>
</html>