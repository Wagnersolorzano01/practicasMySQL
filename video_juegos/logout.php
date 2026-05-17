<?php
session_start();
// Detruyo la sesión del usuario
session_destroy();
// Regreso o redirigo al inicio o al login
header("Location: index.php");
exit();
?>