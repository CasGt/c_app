<?php
session_start();
//error_reporting(0);
include '../includes/validarS.php';
include "../Connections/conexionCurriculum.php";

$usuario = $_SESSION['usuario'];
 if ($conexion->connect_error) {
      $mensaje .= "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
      <strong>Error de conexi®Æn:</strong> $conexion->connect_error
      <span aria-hidden='true'>&times;</span>
      </button>   
      </div>";
    }else{
        $user_activo = "SELECT * FROM user WHERE username = '$usuario'";

$sql = mysqli_query($conexion, $user_activo);
$row = mysqli_fetch_array($sql);
$usuario_activo = $row['name'];


    }


?>

<html lang="en">
<head>
  <script type="text/javascript"  src="js/navegacion.js"></script>
  <!-- CSS only -->
     <link rel="stylesheet" type="text/css" href="../assets/css/estilosCurriculum.css">
</head>
<body>
<?php include 'includes/navBar.php'; ?>
<br><br><br><br><br><br><br><br>
<div class="opciones">
  <h1> Bienvenid@: <?php echo $usuario_activo?>  </h1>
<br>
  <p>En esta secci√≥n encontrara todo lo relacionado a los curriculum que se utilizan en CAS.</p>
  <div class="btn" style="justify-content: space-between">
  <br>
    <button class="btn1" onClick="navNivelEscolar()">Por nivel escolar</button>
    <br>
    <button class="btn1" onClick="navAsignaturas()">Por asignaturas</button>
  </div>
</div>
</body>

</html>
