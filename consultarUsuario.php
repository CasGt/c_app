<?php
session_start();
error_reporting(0);
include 'includes/validarS.php';
include 'includes/navBar.php';
include "../Connections/conexionCurriculum.php";
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/estilos.css">
    <title>Document</title>
</head>


<form  name="form2" method="POST" action="consultarUsuario.php">
           <?php
           /*FILTRO de busqueda////////////////////////////////////////////*/
           $query = 'SELECT * FROM user ';
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
        <p ><i ></i> <?php echo $numeroSql; ?> Resultados encontrados</p>
        <?php
        $getActivo = 'SELECT * FROM user WHERE status = 1';
        $getActivo2 = $conexion->query($getActivo);
        $getActivo3 = mysqli_num_rows($getActivo2);
        ?>
        <p ><i ></i> <?php echo $getActivo3; ?> Usuarios activos</p>


</form>

        <table class="resp">
                <thead>
                        <tr>
                                <th scope="col"> Email </th>
                                <th scope="col"> Contraseña </th>
                                <th scope="col"> Role </th>
                                <th scope="col"> Nombre </th>
                                <th scope="col"> Estado</th>
                        </tr>
                </thead>
                <tbody>
                <?php while ($rowSql = $sql->fetch_assoc()) { ?>
                        <tr>
                        <td><?php echo $rowSql['username']; ?></td>
                        <td><?php echo $rowSql['password']; ?></td>
                        <td><?php echo $rowSql['role']; ?></td>
                        <td><?php echo $rowSql['name']; ?> </td>
                        <td><?php echo $rowSql['status']; ?> </td>
                        </tr>
               <?php } ?>
                </tbody>
        </table>
     

</html>