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

    <form action="editarCurricular.php" method="POST">
        <div class="form__crear__usuario">

            <h2>Editar curricular</h2>
            <br>
            <div class="busqueda">
                <input class="input-search" type="search" id="id_curricular" placeholder="Buscar por id" name="id_curricular" value=""  /> </input>
                <button class="btn-submit-search" type="submit" value="search" name="enviar" id="enviar">&nbsp;</button>
                <button class="btn-submit-save" type="submit" value="editar" name="editar" id="editar">&nbsp;</button>
            </div>

          
            <p type="Id"><input  type="number" id= "idC"name="idC" value="" readonly ></input></p>
            <p type="Titulo"><input  id= "titulo"name="titulo" value="" ></input></p>
            <p type="Contenido"><input  id= "contenido"name="contenido" value="" ></input></p>
           
            <br><br>

        </div>
        <?php
    
        ?>
        <script>
        console.log(<?php echo $dato ?>)
        </script>
        <?php
        if (isset($_POST['enviar'])) {

            $id_curricular = $_POST['id_curricular'];
            if(empty($id_curricular)){
                ?>
        <script>
        alert("No se ha ingresado un id_curricular");
        </script>
        <?php
                return;
            }else{
              ?>
        <script>
        console.log(<?php echo $dato ?>)
        </script>
        <?php
            $id_curricular = $_POST['id_curricular'];
            echo $id_curricular;
            $query = "SELECT * FROM curricular WHERE id = '$id_curricular' ";
            $resultado = mysqli_query($conexion, $query);
            $informacion = mysqli_fetch_array($resultado);

                 ?>

       
        <script>
        document.getElementById("idC").value = <?php echo json_encode($informacion['id']) ?>;  
        document.getElementById("titulo").value = <?php echo json_encode($informacion['titulo']) ?>;
       document.getElementById("contenido").value = <?php echo json_encode($informacion['contenidos']) ?>;
   

        </script>

        <?php
          
            }
        }

        else if(isset($_POST['editar'])) {
            $idC = $_POST['idC'];
            $titulo = $_POST['titulo'];
            $contenido = $_POST['contenido'];

            if(empty($idC)){
                ?>
        <script>
        alert("No se ha ingresado un id curricular");
        </script>
        <?php
                return;
            }
            if(!empty($idC)){
              
            $query = " UPDATE curricular SET titulo = '$titulo', contenidos = '$contenido' WHERE id = '$idC' ";
                if($conexion -> query($query) === TRUE){
                    ?>
            <script>
            alert("Curricular con id <?php echo $idC ?> actualizada");
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