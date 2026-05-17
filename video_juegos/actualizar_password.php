<?php
session_start();
include("conexion.php");

// Verifico si el usuario tiene iniciada la sesión
if (!isset($_SESSION['id'])) {
    header("Location: login.php");
    exit();
}

// Obtengo el id del usuario  
$id = $_SESSION['id'];

// Obtengo las contreseñas del formulario 
$actual = $_POST['actual'];
$nueva = $_POST['nueva'];
$confirmar = $_POST['confirmar'];

// Verifico que no existan campos vacíos
if (empty($actual) || empty($nueva) || empty($confirmar)) {
    die("Todos los campos son obligatorios");
}

// Valido longitud de la contraseña
if (strlen($nueva) < 6) {
    die("La nueva contraseña debe tener mínimo 6 caracteres");
}

// Verifico que ambas contraseñas sean iguales 
if ($nueva !== $confirmar) {
    die("La confirmación de contraseña no coincide");
}

// Busco la contraseña actual del usuario
$sql = "SELECT password FROM jugadores WHERE id = ?";
$stmt = $conexion->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();

$resultado = $stmt->get_result();

// Verifico si existe el usuario 
if ($resultado->num_rows === 1) {

    $usuario = $resultado->fetch_assoc();

    // Comparo la contraseña ingresada con la guardada 
    if (password_verify($actual, $usuario['password'])) {

        // Encripto la nueva contraseña
        $nuevoHash = password_hash($nueva, PASSWORD_DEFAULT);

        // Actualizo la nueva contraseña
        $sql = "UPDATE jugadores SET password = ? WHERE id = ?";
        $stmt = $conexion->prepare($sql);
        $stmt->bind_param("si", $nuevoHash, $id);

        if ($stmt->execute()) {

            echo "
            <script>
                alert('Contraseña actualizada correctamente');
                window.location = 'perfil.php';
            </script>
            ";

        } else {

            echo "
            <script>
                alert('Error al actualizar la contraseña');
                window.location = 'cambiar_password.php';
            </script>
            ";

        }

    } else {

        echo "
        <script>
            alert('La contraseña actual es incorrecta');
            window.location = 'cambiar_password.php';
        </script>
        ";

    }

} else {

    echo "
    <script>
        alert('Usuario no encontrado');
        window.location = 'login.php';
    </script>
    ";

}

$conexion->close();
?>