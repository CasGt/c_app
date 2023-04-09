<?php
session_start();
error_reporting(0);
include 'includes/validarS.php';
include 'includes/navBar.php';
include "../Connections/conexionCurriculum.php";


?>

<head>
    <link rel="stylesheet" href="css/estilos.css">
</head>

<body>

    <form action="editarUsuario.php" method="POST">
        <div class="form__crear__usuario">

            <h2>Editar usuario</h2>
            <br>
            <div class="busqueda">
                <input class="input-search" type="search" id="username " name="username" value=""  /> </input>
                <button class="btn-submit-search" type="submit" value="search" name="enviar" id="enviar">&nbsp;</button>
                <button class="btn-submit-save" type="submit" value="editar" name="editar" id="editar">&nbsp;</button>
            </div>

          
            <p type="Nombre"><input  id= "nombre_usuario"name="nombre_usuario" value="" readonly ></input></p>
            <p type="Nombre"><input  id= "nombre"name="nombre" value="" ></input></p>
            <p type="Apellido"><input  id= "apellido"name="apellido" value="" ></input></p>
            <p type="Contraseña"><input  id= "contraseña"name="contraseña" value="" ></input></p>

            <br><br>

        </div>
        <?php
 
        $dato = 0;
        ?>
        <script>
        console.log(<?php echo $dato ?>)
        </script>
        <?php
        if (isset($_POST['enviar'])) {

            $usuario = $_POST['username'];
            if(empty($usuario)){
                ?>
        <script>
        alert("No se ha ingresado un usuario");
        </script>
        <?php
                return;
            }else{

              $dato= $dato+1;
              ?>
        <script>
        console.log(<?php echo $dato ?>)
        </script>
        <?php
            $username = $_POST['username'];
            
            $query = "SELECT * FROM user WHERE username = '$username' ";
            $resultado = mysqli_query($conexion, $query);
            $informacion = mysqli_fetch_array($resultado);

                 ?>

       
        <script>
        document.getElementById("nombre_usuario").value = <?php echo json_encode($informacion['username']) ?>;  
        document.getElementById("nombre").value = <?php echo json_encode($informacion['name']) ?>;
       document.getElementById("apellido").value = <?php echo json_encode($informacion['lastName']) ?>;
       document.getElementById("contraseña").value = <?php echo json_encode($informacion['password']) ?>;

        </script>

        <?php
          
            }
        }

        else if(isset($_POST['editar'])) {
            $username = $_POST['nombre_usuario'];
            $name = $_POST['nombre'];
            $lastName = $_POST['apellido'];
            $password = $_POST['contraseña'];

            if(empty($name)){
                ?>
        <script>
        alert("No se ha ingresado un nombre");
        </script>
        <?php
                return;
            }
            if(!empty($lastName)){
              
            $query = " UPDATE user SET username = '$username', name = '$name', lastName = '$lastName', password = '$password' WHERE username = '$username' ";
                if($conexion -> query($query) === TRUE){
                    ?>
            <script>
            alert("Usuario <?php echo $username ?> actualizado");
            </script>
            <?php
                }else{
                    ?>
                    <script>
                    alert("Error al actualizar usuario");
                    </script>
                    <?php
                }
                
       ?>

        <?php
      
    } }
        ?>

    </form>
</body>