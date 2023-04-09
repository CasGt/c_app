<?php

include "../Connections/conexionCurriculum.php";

 if ($conexion->connect_error) {
      $mensaje .= "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
      <strong>Error de conexión:</strong> $conexion->connect_error
      <span aria-hidden='true'>&times;</span>
      </button>   
      </div>";
    }else{
        
    $usuario = $_SESSION['usuario'];
    
    $sql = "SELECT role FROM user WHERE username = '$usuario'";

    $result = $conexion->query($sql);
    $row = $result->fetch_array(MYSQLI_ASSOC);
    
    }

?>
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>

<?php if ($row['role'] == 'admin') { ?>
 <!-- navbar role administrador -->
<div class="topnav" id="myTopnav">
      <a href="principal.php">Inicio</a>
      <a href="crearUsuario.php">Añadir usuario</a>
      <a href="crearCurricular.php">Añadir curricular</a>
      <a href="editarCurricular.php">Editar curricular</a>
      <a href="consultar_curricular.php">Ver curricular</a>
      <a href="consultarUsuario.php">Consultar usuarios</a>
      <a href="editarUsuario.php">Editar usuario</a>
      <a class="li-logout" href="includes/cerrarS.php">Logout</a>
      <a href="javascript:void(0);" class="icon" onclick="myFunction()">
    <i class="fa fa-bars"></i>
  </a>
  </div>

    <?php } elseif ($row['role'] == 'user') { ?>
<!-- navbar role usuario -->
<div class="topnav" id="myTopnav"> 
      <a href="principal.php">Inicio</a> 
      <a href="crearCurricular.php">Añadir curricular</a>
      <a href="consultar_curricular.php">Ver curricular</a>
      <a href="editarCurricular.php">Editar curricular</a>
      <a class="li-logout" href="includes/cerrarS.php">Logout</a>
      <a href="javascript:void(0);" class="icon" onclick="myFunction()">
    <i class="fa fa-bars"></i>
  </a>
  </div>
        <?php } ?>


<script> /* navbar responsive --> */
function myFunction() { 
  var x = document.getElementById("myTopnav"); /* Get the topnav */
  if (x.className === "topnav") { /* If topnav is responsive, change it back to topnav */
    x.className += " responsive"; /* Add the class "responsive" to topnav (for mobile devices) */
  } else {  /* If topnav is not responsive, change it back to topnav */
    x.className = "topnav"; /* Remove the class "responsive" from topnav */
  }
}
</script>

</body>