<?php
//codigo de inicio de sesion y toma de datos

include 'conexion_be.php';
$id=$_GET['idUsuario'];

$consulta = "DELETE FROM perfil WHERE idperfil_user = '$id'";

        //crea un array si encuentra la imagen con el correo
$resultado = mysqli_query($conexion, $consulta);
header('location: ../administrador.php')

?>