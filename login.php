<?php
session_start();
error_reporting(0);
include "../Connections/conexionCurriculum.php";
//declaracion de variables
// isset

  if (isset($_POST['btnIniciarSesion'])) {
      $rusuario = $_POST['usuario'];
      $rpassword = $_POST['password'];
        
    if ($conexion->connect_error) {
      $mensaje .= "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
      <strong>Error de conexión:</strong> $conexion->connect_error
      <span aria-hidden='true'>&times;</span>
      </button>   
      </div>";
    } else {

      if(empty($rusuario) || empty($rpassword)){
        $mensaje .= "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
        <strong>Debes ingresar todos los datos
        <span aria-hidden='true'>&times;</span>
        </button>   
        </div>";
      }else{  
        $sql = "SELECT * FROM cas_curriculum.user WHERE username = '$rusuario' AND password = '$rpassword'";
        $result = $conexion->query($sql);

        $row = $result->fetch_array(MYSQLI_ASSOC);
          
        if ($row['username'] == $rusuario && $row['password'] == $rpassword) {
            $_SESSION['login'] = true;
            $_SESSION['usuario'] = $rusuario;
            header('Location: ./principal.php');
        } else {
          $mensaje .= "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
          <strong>Tus datos no son correctos</strong> por favor verifica tus datos.
          <span aria-hidden='true'>&times;</span>
          </button>   
          </div>";
          }
      }
      
    }

      
  } 
    
    
    
?>


<html lang="en">

<head>

    <title>Login</title>
    <!-- iconos font-awesome -->
    
    <script src="https://kit.fontawesome.com/9d0ecd6d4d.js" crossorigin="anonymous"></script>
    <!-- CSS only -->

    <link rel="stylesheet" type="text/css" href="../assets/css/estilosCurriculum.css">
</head>

<body>
    <div class="container" >
        <h1>Iniciar sesión</h1>
 
        <form method="post" action="">
            <div class="form__group form__div">
                <span><i class="fa-solid fa-envelope"></i></span>
                <input class="campo" type="email" placeholder="Email" id="usuario" name="usuario">
            </div>
            <div class="form__group form__div">
                <span><i class="fa-solid fa-lock"></i></span>
                <input class="campo" type="password" placeholder="Password" id="input" name="password">
            </div>
            <div class="form__group">
                <input class="button" type="submit" value="submit" name="btnIniciarSesion" placeholder="Access"></>
            </div>
           <!-- <div class="form__group__enlace">
                <a class="enlace" href="#">I forgot my password</a>
            </div> -->
        </form>

        <hr>
        <?php echo $mensaje; ?>
</body>

</html>