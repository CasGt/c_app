<?php
session_start(); // Inicia la sesión
session_unset(); // Elimina las variables de sesión
session_destroy(); // Destruye la sesión

header("Location: ../login.php");// Redirige al usuario a la página de inicio de sesión
?>