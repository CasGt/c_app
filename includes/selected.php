
<?php


function selected_Asignatura(){
    include 'conexion.php'; // Incluye el archivo de conexión a la base de datos
    $getAsignatura = "SELECT DISTINCT asignatura_descripcion FROM info_curriculum"; // Selecciona todos los registros de la tabla asignatura
    $getAsignatura2 = mysqli_query($conexion, $getAsignatura); // Ejecuta la consulta
    while ($row = mysqli_fetch_array($getAsignatura2)) { //Mientras haya registros en la tabla asignatura
        $id_asig = $row['id']; // Guarda el id de la asignatura
        $nombre_asig = $row['asignatura_descripcion']; //   Guarda el nombre de la asignatura
    ?>
        <option value="<?php echo $id; ?>"><?php echo $nombre_asig; ?> </option> // Muestra los registros en un select
    <?php
    $n_asig = $nombre_asig;;
    } //end while


    
}

function selected_Grado(){
    include 'conexion.php'; // Incluye el archivo de conexión a la base de datos
    $getAsignatura = "SELECT DISTINCT asignatura_descripcion FROM info_curriculum"; // Selecciona todos los registros de la tabla asignatura
    $getAsignatura2 = mysqli_query($conexion, $getAsignatura); // Ejecuta la consulta
    while ($row = mysqli_fetch_array($getAsignatura2)) { //Mientras haya registros en la tabla asignatura
        $id_asig = $row['id']; // Guarda el id de la asignatura
        $nombre_asig = $row['asignatura_descripcion']; //   Guarda el nombre de la asignatura
    ?>
        <option value="<?php echo $id; ?>"><?php echo $nombre_asig; ?> </option> // Muestra los registros en un select
    <?php
    $n_asig = $nombre_asig;;
    } //end while
}

function selected_Periodo(){
    include 'conexion.php'; // Incluye el archivo de conexión a la base de datos
    $getAsignatura = "SELECT DISTINCT asignatura_descripcion FROM info_curriculum"; // Selecciona todos los registros de la tabla asignatura
    $getAsignatura2 = mysqli_query($conexion, $getAsignatura); // Ejecuta la consulta
    while ($row = mysqli_fetch_array($getAsignatura2)) { //Mientras haya registros en la tabla asignatura
        $id_asig = $row['id']; // Guarda el id de la asignatura
        $nombre_asig = $row['asignatura_descripcion']; //   Guarda el nombre de la asignatura
    ?>
        <option value="<?php echo $id; ?>"><?php echo $nombre_asig; ?> </option> // Muestra los registros en un select
    <?php
    $n_asig = $nombre_asig;;
    } //end while
}


            ?>