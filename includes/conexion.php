<?php
//declaracion de variables
$servidor ="127.0.0.1";
$usuario = "root";
$contraseña ="";
$basededatos = "curriculum";

//creacion de la conexion
$conexion = mysqli_connect($servidor, $usuario, $contraseña, $basededatos);
$conexion -> set_charset("utf8");
if($conexion->connect_error){
    die("La conexion ha fallado: " . $conexion->connect_error);
}

?>