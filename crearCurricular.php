<?php
session_start();
error_reporting(0);
include 'includes/validarS.php';
include 'includes/navBar.php';
include "../Connections/conexionCurriculum.php";

$usuario = $_SESSION['usuario'];
$user_activo = "SELECT * FROM user WHERE username = '$usuario'";
$result = mysqli_query($conexion, $user_activo);
$row = mysqli_fetch_array($result);
$usuario_activo = $row['name'];

?>

<head>
    <link rel="stylesheet" href="css/estilos.css">
</head>

<body>
<form action="crearCurricular.php" method="POST">
    <div class="form__crear">
        <h2>Ingrese datos del nuevo curriculum</h2>
        <p type="Asignatura">
        <div class="caja">
            <select id="asignatura" name="asignatura">
                <?php
                 // Incluye el archivo de conexión a la base de datos
                $getAsignatura = 'SELECT * FROM asignatura'; // Selecciona todos los registros de la tabla asignatura
                $getAsignatura2 = mysqli_query($conexion, $getAsignatura); // Ejecuta la consulta
                while ($row1 = mysqli_fetch_array($getAsignatura2)) {

                    //Mientras haya registros en la tabla asignatura
                    $id_asig = $row1['id']; // Guarda el id de la asignatura
                    $nombre_asig = $row1['asignatura_descripcion'];

                    //   Guarda el nombre de la asignatura
                    ?>
                <option value="<?php echo $id_asig; ?>"><?php echo $nombre_asig; ?> </option> // Muestra los registros en un select
                <?php $n_asig = $nombre_asig;
                }

//end while
?>
            </select>
        </div>
        </p>

        <p type="Grado">
        <div class="caja">
            <select id="grado" name="grado">
                <?php
                 // Incluye el archivo de conexión a la base de datos
                $getGrado = 'SELECT * FROM grado'; // Selecciona todos los registros de la tabla asignatura
                $getGrado2 = mysqli_query($conexion, $getGrado); // Ejecuta la consulta
                while ($row2 = mysqli_fetch_array($getGrado2)) {

                    //Mientras haya registros en la tabla asignatura
                    $id_grad = $row2['id']; // Guarda el id de la asignatura
                    $nombre_grad = $row2['grado_descripcion'];

                    //   Guarda el nombre de la asignatura
                    ?>
                <option value="<?php echo $id_grad; ?>"><?php echo $nombre_grad; ?> </option>
                <?php
                }
                
                    

//end while
?>
            </select>
        </div>
        </p>

        <p type="Periodo">
        <div class="caja">
            <select id="periodo" name="periodo">
                <?php
                 // Incluye el archivo de conexión a la base de datos
                $getPeriodo = 'SELECT * FROM periodo'; // Selecciona todos los registros de la tabla asignatura
                $getPeriodo2 = mysqli_query($conexion, $getPeriodo); 
                // Ejecuta la consulta
                while ($row3 = mysqli_fetch_array($getPeriodo2)) {

                    //Mientras haya registros en la tabla asignatura
                    $id_periodo = $row3['id']; // Guarda el id de la asignatura
                    $nombre_periodo = $row3['periodo_descripcion'];

                    //   Guarda el nombre de la asignatura
                    ?>
                <option value="<?php echo $id_periodo; ?>"><?php echo $nombre_periodo; ?> </option> // Muestra los
                registros en un select
                <?php $n_periodo = $nombre_periodo;
                }

//end while
?>
            </select>
        </div>
        </p>

        <p type="Titulo"><input name="titulo" placeholder="Escriba el título asignado"></input></p>
        <p type="Contenido"><input name="contenido" placeholder="Ingrese una descripción breve"></input></p>

        <br>
        <p><input class="button"  type="submit" value="Guardar"></input></p>

    </div>


    <?php
    include 'conexion.php';

    if (
        isset($_POST['asignatura']) &&
        isset($_POST['grado']) &&
        isset($_POST['periodo']) &&
        isset($_POST['titulo']) &&
        isset($_POST['contenido'])
    ) {
        if (
            $_POST['asignatura'] == '' ||
            $_POST['grado'] == '' ||
            $_POST['periodo'] == '' ||
            $_POST['titulo'] == '' ||
            $_POST['contenido'] == ''
        ) { ?> 
            <script type="text/javascript">
            window.onload = function myFunction() {
                alert("Por favor, llene todos los campos");
            }
            </script>
            <?php return;} else {

            $asignatura = (int) $_POST['asignatura'];
            $grado = (int)$_POST['grado'];
       
            $getAsigGrad = "SELECT id FROM asignatura_grado WHERE fk_id_grado = '$grado' and fk_id_asignatura = '$asignatura'";
            $getAsigGrad2 = $conexion->query($getAsigGrad);
            $getAsigGrad2 = $getAsigGrad2->fetch_assoc();
            $getAsig2 = $getAsigGrad2['id'];
            $getAsig2 = $getAsig2;

            $periodo = (int) $_POST['periodo'];
            $titulo = $_POST['titulo'];
            $contenido = $_POST['contenido'];
            
            $query = "INSERT INTO curricular ( fk_id_asignatura_grado, fk_id_periodo, titulo, contenidos, usuario_create ) VALUES ('$getAsigGrad2[id]', '$periodo', '$titulo', '$contenido', '$usuario_activo' )";
            echo $query;

            if ($conexion->query($query) === true) { ?>
            <script type="text/javascript">
            window.onload = function myFunction() {
                alert("Curricular ingresada correctamente");
            }
            </script>

            
    
            <¡<?php } else { ?> <script type="text/javascript">
                window.onload = function myFunction() {
                alert("Ocurrió un error, vuelva a intentarlo");
                }
                </script>
    
                <?php }}
    }
    ?>

    </form>

</body>