<?php
// Start a session and include the necessary files
session_start();
include 'includes/validarS.php';
include 'includes/conexion.php';

// Retrieve the selected value from the request
$asignatura = $_POST['asignatura'];

// Query the database for the filtered contents
$consulta = "SELECT asignatura_descripcion, grado_descripcion, titulo, contenido, periodo, P FROM info_curriculum WHERE asignatura_descripcion = '$asignatura'  ORDER BY P ASC";
$resultado = mysqli_query($conexion, $consulta);
$informacion = $resultado->fetch_all(MYSQLI_ASSOC);

// Output the filtered contents
foreach ($informacion as $informacion) {
    if ($asig == $informacion['asignatura_descripcion']) {
        echo '<option value="' .
            $informacion['asignatura_descripcion'] .
            '" selected>' .
            $informacion['informacion'] .
            '</option>';
    } else {
        echo '<option value="' .
            $informacion['asignatura_descripcion'] .
            '">' .
            $informacion['informacion'] .
            '</option>';
    }
}
