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
    <form name="form2" method="GET" action="por_nivel.php">
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
            <h1>Por nivel escolar</h1>
        </div>
        <section class="filter">
            <div class="grid">
                <div class="category">
                    <select  id="search_nivel">
                    <option value="0">Todos los grados</option>
                        <?php
                        
                        $as = $_GET['grado'];

                        include 'conexion.php'; // Incluye el archivo de conexión a la base de datos
                        $getGrado =
                        'SELECT DISTINCT id_grado, grado_descripcion FROM info_curriculum'; // Selecciona todos los registros de la tabla asignatura
                        $getGrado2 = mysqli_query(
                            $conexion,
                            $getGrado
                        );

// Ejecuta la consulta
?>
                        <?php while (
                            $row = mysqli_fetch_array($getGrado2)
                        ) {
                            if ($as == $row['id_grado']) {
                                ?>
                        <option value="<?php echo $row[
                            'id_grado'
                        ]; ?>" selected><?php echo $row[
    'grado_descripcion'
]; ?> </option>
                        <?php
                            } else {
                                 ?> <option value="<?php echo $row[
     'id_grado'
 ]; ?>"><?php echo $row['grado_descripcion']; ?> </option>
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
            $search_grado = $_REQUEST['grado'];
            if($search_grado == 0){
                $consulta =
                "SELECT id_grado, asignatura_descripcion, grado_descripcion, titulo, contenido, periodo, P FROM info_curriculum ORDER BY P ASC";
            }else{
            $consulta =
                "SELECT id_grado, asignatura_descripcion, grado_descripcion, titulo, contenido, periodo, P FROM info_curriculum where id_grado= '$search_grado'  ORDER BY P ASC";
            }
                $resultado = mysqli_query($conexion, $consulta);
            $informacion = $resultado->fetch_all(MYSQLI_ASSOC);
            foreach ($informacion as $informacion) { ?>
            <div class="column">
                <div class="card">
                    <!-- Titulo grado -->
                    <h1><?php echo $informacion['asignatura_descripcion']; ?></h1>
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

<script src="js/buscar_nivel.js"></script>

</html>