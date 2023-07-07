<?php
//codigo de inicio de sesion y toma de datos
include 'conexion_be.php';
session_start();

if (isset($_SESSION['perfil'])) {
} else {
    header("location: cuenta.php");
}

$id = $_SESSION['perfil'];
$nombre = $_POST['nombreNuevo'];
$apellido = $_POST['apellidoNuevo'];
$email = $_POST['correoNuevo'];
$pass = $_POST['passNuevo'];
$pass = hash('sha512', $pass);






//Cambio de datos sin contraseña
$validar_usuario = mysqli_query($conexion, "SELECT * FROM perfil  WHERE correo_electronico ='$id'");

if(!empty($nombre) || !empty($apellido) || !empty($email) || !empty($pass)){
//query de update
            $actualizar =  mysqli_query($conexion, "INSERT INTO perfil SET nombre='$nombre', apellido='$apellido', correo_electronico='$email', pass_user='$pass', imagen='usuario-perfil.png'");
            if ($actualizar) {
                echo "<script>alert
                                ('Se ha añadido un perfil');
                                window.location = '../administrador.php';
                         </script>";
            } else {
                echo "<script>alert
                                ('Por favor, verifique los datos ingresados');
                            </script>";
            }
        }else{
            echo "<script>alert
                            ('Por favor, verifique los datos ingresados');
                        </script>";}
            ?>            