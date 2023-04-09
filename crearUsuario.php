<?php
session_start();
error_reporting(0);
include 'includes/validarS.php';
include 'includes/navBar.php';
?>

<head>
    <link rel="stylesheet" href="css/estilos.css">
</head>

<body>
    <form action="crearUsuario.php" method="POST">
        <div class="form__crear__usuario">
            <h2>Ingrese datos del nuevo usuario</h2>
            <p type="Email"><input type="email" placeholder="Ingrese correo" name="username"></input></p>
            <p type="Password"><input type="password" placeholder="Ingrese contraseña" name="password"></input></p>
            <p type="Nombre"><input type="text" placeholder="Ingrese primer nombre en minusculas" name="name"></input></p>
            <p type="Apellido"><input type="text" placeholder="Ingrese primer apellido en minusculas" name="lastName"></input></p>
            <p type="Role">
            <div class="caja">
                <select type="text" name="role">
                    <option value="1" >admin</option>
                    <option value="2">user</option>
                </select>
            </div>
            </p>
            <p><input class="button" type="submit" value="Crear usuario"></input></p>
        </div>
        <?php
        include 'conexion.php';

        if (
            isset($_POST['username']) &&
            isset($_POST['password']) &&
            isset($_POST['name']) &&
            isset($_POST['lastName']) &&
            isset($_POST['role'])
        ) {
            if (
                $_POST['username'] == '' ||
                $_POST['password'] == '' ||
                $_POST['name'] == '' ||
                $_POST['lastName'] == '' ||
                $_POST['role'] == ''
            ) { ?> 
                <script>
                    function ready() {
                        alert("Por favor, llene todos los campos");
                    }
                    document.addEventListener("DOMContentLoaded", ready);
                </script>
    
                <?php return;} else {$username = $_POST['username'];
                $password = $_POST['password'];
                $role = $_POST['role'];
                $name = $_POST['name'];
                $lastName = $_POST['lastName'];

                $query = "INSERT INTO user ( username, password, role, name, lastName, status) VALUES ('$username', '$password', '$role', '$name', '$lastName', 1 )";
                    echo $query;
                if ($conexion->query($query) === true) { ?>
            <script type="text/javascript">
            window.onload = function myFunction() {
                alert("Usuario creado correctamente");
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