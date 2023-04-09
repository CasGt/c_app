<?php
session_start();
error_reporting(0);
include '../includes/validarS.php';
include "../Connections/conexionCurriculum.php";
?>

<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta charset="utf8_encode()">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="css/estilos.css">

    <title>change</title>
</head>

<body>
    <form method="GET" action="">
        <!-- navBar -->
        <header class="header">
            <nav class="navbar" style="background-color: #8c2633">
                <div class="container-fluid">
                    <ul>
                        <li><img src="img/cas_white.png" alt="Logo" width="80px" height="44"
                                class="d-inline-block align-text-top" /> </li>
                        <li class="li-logout"><a class="active" href="principal.php"> ← </a></li>
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
                    <select name="asignatura" id="search_asignatura" name="search_asignatura">
                        <option value="0">Todas las asignatura</option>
                        <?php
 include "../Connections/conexionCurriculum.php";
 
                        $getAsignatura = 
                            'SELECT DISTINCT id_asignatura, asignatura_descripcion FROM info_curriculum'; // Selecciona todos los registros de la tabla asignatura
                        $getAsignatura2 = mysqli_query(
                            $conexion,
                            $getAsignatura
                        );
?>
                        <?php while (
                            $row = mysqli_fetch_array($getAsignatura2)
                        ) {

                            //Mientras haya registros en la tabla asignatura
                            $id_asig = $row['id_asignatura']; // Guarda el id de la asignatura
                            $nombre_asig = $row['asignatura_descripcion'];

                            //   Guarda el nombre de la asignatura
                            ?>
                        <option value="<?php echo $id_asig; ?>"><?php echo $nombre_asig; ?> </option> // Muestra los
                        registros en un select
                        <?php
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
            
             if ($conexion->connect_error) {
              $mensaje .= "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
              <strong>Error de conexión:</strong> $conexion->connect_error
              <span aria-hidden='true'>&times;</span>
              </button>   
              </div>";
            }else{
            $sql =
                'SELECT asignatura_descripcion, grado_descripcion, titulo, contenido, periodo, P FROM info_curriculum ORDER BY P ASC';
            $resultado = mysqli_query($conexion, $sql);
            while ($informacion = mysqli_fetch_array($resultado))  { ?>
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
            }
            mysql_close($conexion);
            
            ?>
           
        </div>
        <br><br>
    </form>
    
<script type= "text/javascript" src="js/buscar_asignatura.js"></script>
</body>


</html>