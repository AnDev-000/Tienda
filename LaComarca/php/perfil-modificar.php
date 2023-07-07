<?php
//codigo de inicio de sesion y toma de datos
include 'conexion_be.php';
session_start();

if (isset($_SESSION['perfil'])) {
} else {
    header("location: cuenta.php");
}

$id = $_SESSION['perfil'];
$nombres = $_POST['nombre'];
$apellidos = $_POST['apellido'];
$email = $_POST['email'];

//foto
$imagen = $_FILES['imagen']['name'];
$tipo_imagen = $_FILES['imagen']['type'];
$tamano_imagen = $_FILES['imagen']['size'];



//Cambio de datos sin contraseña
$validar_usuario = mysqli_query($conexion, "SELECT * FROM perfil  WHERE correo_electronico ='$id'");


if (!empty($imagen)) {

    if ($tamano_imagen <= 1000000) {

        if ($tipo_imagen == "image/jpeg" || $tipo_imagen == "image/jpg" || $tipo_imagen == "image/png") {

            //Ruta de la carpeta destino para guardar las imagenes del perfil en el servidor
            $carpeta_destino = $_SERVER['DOCUMENT_ROOT'] . '/Comarca/LaComarca1/img usuario/';

            //mueve el archivo temporal a la carpeta
            move_uploaded_file($_FILES['imagen']['tmp_name'], $carpeta_destino . $imagen);


            //query de update
            $actualizar =  mysqli_query($conexion, "UPDATE perfil SET nombre='$nombres', apellido='$apellidos', correo_electronico='$email'
                                            , imagen='$imagen' WHERE correo_electronico = '$id'");
            if ($actualizar) {
                echo "<script>alert
                                ('Se ha actualizado su perfil');
                                window.location = '../modificar-perfil.php';
                         </script>";
            } else {
                echo "<script>alert
                                ('Por favor, verifique los datos ingresados');
                            </script>";
            }
        } else {
            echo "Solo se pueden subir imagenes jpg/jpeg/png";
        }
    } else {

        echo "El tamaño del archivo supera el limite";
    }
} elseif(empty($imagen)) {


    //selecciona la imagen de la base de datos
    $consulta = "SELECT imagen FROM perfil WHERE correo_electronico = '$id'";

    //crea un array si encuentra la imagen con el correo
    $resultado = mysqli_query($conexion, $consulta);

    while ($fila = mysqli_fetch_array($resultado)) {

        $img = $fila["imagen"];
    }


    //query de update
    $actualizar =  mysqli_query($conexion, "UPDATE perfil SET nombre='$nombres', apellido='$apellidos', correo_electronico='$email' , imagen='$img' WHERE correo_electronico = '$id'");
    if ($actualizar) {
        echo "<script>alert
         ('Se ha actualizado su perfil');
         window.location = '../modificar-perfil.php';
         </script>";
    } else {
        echo "<script>alert
         ('ha ocurrido un error');
         </script>";
    }
}
