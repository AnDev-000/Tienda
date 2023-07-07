<?php
include 'conexion_be.php';
session_start();

if (isset($_SESSION['perfil'])) {
} else {
    header("location: cuenta.php");
}

$idPublic = $_GET["idPublic"];
$id_vendedor = $_GET["idVendedor"];




//recoger informacion del comprador
$id = $_SESSION['perfil'];

$actualizar =  mysqli_query($conexion, "UPDATE publicacion SET estado ='inactivo' WHERE id_publicacion = '$idPublic'");



$consulta = "SELECT idperfil_user FROM perfil WHERE correo_electronico = '$id'";

    //crea un array si encuentra la imagen con el correo
    $resultado = mysqli_query($conexion, $consulta);

    while($fila=mysqli_fetch_array($resultado)){   

        $id_comprador = $fila["idperfil_user"];
    }

    $query = "INSERT INTO venta( id_vendedor, id_comprador, id_productovendido)
    VALUES('$id_vendedor','$id_comprador','$idPublic')";


    $ejecutar = mysqli_query($conexion, $query);
  
        if($ejecutar){
            echo "
            <script>
                alert('Compra realizada correctamente');
                window.location = 'publicacion.php?idPublic=$idPublic';
                
                </script>";
 
        }else{
            echo '
            <script>
                alert("ha ocurrido un errordurante la compra");
                window.location = "../perfil-direcciones.php";
            </script>';
        }
    





?>