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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/estilos.css">
    <title>Document</title>
</head>


<form  name="form2" method="POST" action="consultarCurricular.php">
           <?php
           /*FILTRO de busqueda////////////////////////////////////////////*/
           $query = "SELECT * FROM curricular WHERE usuario_create = '$usuario_activo' ORDER BY CONCAT(fk_id_asignatura_grado,'',fk_id_periodo) ASC";
           if ($_POST['buscar'] != '') {
               $query .=
                   "WHERE (username LIKE LOWER('%" .
                   $aKeyword[0] .
                   "%') OR name LIKE LOWER('%" .
                   $aKeyword[0] .
                   "%')) ";

               for ($i = 1; $i < count($aKeyword); $i++) {
                   if (!empty($aKeyword[$i])) {
                       $query .=
                           " OR username LIKE '%" .
                           $aKeyword[$i] .
                           "%' OR name LIKE '%" .
                           $aKeyword[$i] .
                           "%'";
                   }
               }
           }
           $sql = $conexion->query($query);
           $numeroSql = mysqli_num_rows($sql);
           ?>
        <p ><i ></i> <?php echo $numeroSql; ?> Resultados encontrados para usuario <?php echo $usuario_activo; ?></p>



</form>

        <table class="resp">
                <thead>
                        <tr>
                                <th scope="col"> id </th>
                                <th scope="col"> Id asignatura grado </th>
                                <th scope="col"> Periodo </th>
                                <th scope="col"> Titulo </th>
                                <th scope="col"> Contenido</th>
                        </tr>
                </thead>
                <tbody>
                <?php while ($rowSql = $sql->fetch_assoc()) { ?>
                        <tr>
                        <td><?php echo $rowSql['id']; ?></td>
                        <td><?php echo $rowSql['fk_id_asignatura_grado']; ?></td>
                        <td><?php echo $rowSql['fk_id_periodo']; ?></td>
                        <td><?php echo $rowSql['titulo']; ?> </td>
                        <td><?php echo $rowSql['contenidos']; ?> </td>
                        </tr>
               <?php } ?>
                </tbody>
        </table>
     

</html>