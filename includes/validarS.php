<?php

include "../Connections/conexionCurriculum.php";
//validar que se cree una variable de sesion al pasar por el login
$usuario = $_SESSION['usuario'];

if(!isset($usuario)){
    header("location: ../login.php"); 
}
?>