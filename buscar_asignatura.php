<?php
session_start();
error_reporting(0);
include 'includes/validarS.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta charset="utf8_encode()">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="css/estilos.css">

    <title>change</title>
</head>

<body>
    <form name="form2" method="GET" action="por_asignatura.php">
        <!-- navBar -->
        <header class="header">
            <nav class="navbar" style="background-color: #8c2633">
                <div class="container-fluid">
                    <ul>
                        <li><img src="img/cas_white.png" alt="Logo" width="80px" height="44"
                                class="d-inline-block align-text-top" /> </li>
                        <li style="float:right; font-size:24px"><a class="active" href="principal.php"> ← </a></li>
                    </ul>
                </div>
            </nav>
            </nav>
        </header>
        <br>
        <div class="title">
            <h1>Por asignatura</h1>
        </div>
        <section class="filter">
            <div class="grid">
                <div class="category">
                    <select name="asignatura" id="search_asignatura">
                    <option value="0">Todas las asignatura</option>
                        <?php
                        
                        $as = $_GET['asignatura'];

                        include 'conexion.php'; // Incluye el archivo de conexión a la base de datos
                        $getAsignatura =
                        'SELECT DISTINCT id_asignatura, asignatura_descripcion FROM info_curriculum'; // Selecciona todos los registros de la tabla asignatura
                        $getAsignatura2 = mysqli_query(
                            $conexion,
                            $getAsignatura
                        );

// Ejecuta la consulta
?>
                        <?php while (
                            $row = mysqli_fetch_array($getAsignatura2)
                        ) {
                            if ($as == $row['id_asignatura']) {
                                ?>
                        <option value="<?php echo $row[
                            'id_asignatura'
                        ]; ?>" selected><?php echo $row[
    'asignatura_descripcion'
]; ?> </option>
                        <?php
                            } else {
                                 ?> <option value="<?php echo $row[
     'id_asignatura'
 ]; ?>"><?php echo $row['asignatura_descripcion']; ?> </option>
                        <?php
                            }
                        }
//end while
?>
                    </select>
                </div>
            </div>
        </section>
        <br><br>
        <div class="row">
            <?php
            include 'includes/conexion.php';
            $sear_asignatura = $_REQUEST['asignatura'];
            if($sear_asignatura == 0){
                $consulta =
                "SELECT id_asignatura, asignatura_descripcion, grado_descripcion, titulo, contenido, periodo, P FROM info_curriculum ORDER BY P ASC";
            }else{
            $consulta =
                "SELECT id_asignatura, asignatura_descripcion, grado_descripcion, titulo, contenido, periodo, P FROM info_curriculum where id_asignatura= '$sear_asignatura'  ORDER BY P ASC";
            }
                $resultado = mysqli_query($conexion, $consulta);
            $informacion = $resultado->fetch_all(MYSQLI_ASSOC);
            foreach ($informacion as $informacion) { ?>
            <div class="column">
                <div class="card">
                    <!-- Titulo grado -->
                    <h1><?php echo $informacion['grado_descripcion']; ?></h1>
                    <!-- Periodo -->
                    <?php echo 'Periodo: ' . $informacion['periodo']; ?>
                    <br><br>
                    <h2 class="card_title">Titulo</h2>
                    <p class="card_text">
                        <?php echo $informacion['titulo']; ?> </p>
                    <br>
                    <h2 class="Contenido">Contenido</h2>
                    <p class="card_text">
                        </i><?php echo $informacion['contenido']; ?> </p>
                </div>
            </div>
            <?php }
            ?>
        </div>
        <br><br>
    </form>
</body>

<script src="js/buscar_asignatura.js"></script>

</html>