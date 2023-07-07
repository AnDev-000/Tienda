<?php
//codigo de inicio de sesion y toma de datos

include 'conexion_be.php';




$idUsuario= $_POST['idEditar'];
$nombre = $_POST['nombreEditar'];
$apellido = $_POST['apellidoEditar'];
$correo = $_POST['correoEditar'];
$tipoUsuario = $_POST['tipoEditar'];
$pass = $_POST['passEditar'];


if(!empty($pass)){
    $pass = hash('sha512', $pass);

    //query de update
                $actualizar =  mysqli_query($conexion, "UPDATE perfil SET nombre='$nombre', apellido='$apellido', correo_electronico='$correo', tipo_usuario='$tipoUsuario', pass_user='$pass' WHERE idperfil_user='$idUsuario'");
                if ($actualizar) {
                    echo "<script>alert('Se ha actualizado un perfil1');
                    window.location = '../administrador.php';</script>";
                } else {
                    echo "<script>alert('Por favor, verifique los datos ingresados');</script>";
                }
            
}elseif(empty($pass)){
    $consulta = "SELECT pass_user FROM perfil WHERE idperfil_user = '$idUsuario'";
       //crea un array si encuentra la imagen con el correo
        $resultado = mysqli_query($conexion, $consulta);
        while ($fila = mysqli_fetch_array($resultado)) {
            $pass_registrada = $fila["pass_user"];
        }
    $actualizar =  mysqli_query($conexion, "UPDATE perfil SET nombre='$nombre', apellido='$apellido', correo_electronico='$correo', tipo_usuario='$tipoUsuario', pass_user='$pass_registrada' WHERE idperfil_user='$idUsuario'");
    if ($actualizar) {
        echo "<script>alert('Se ha actualizado un perfil2');
        window.location = '../administrador.php';</script>";
    } else {
        echo "<script>alert('Por favor, verifique los datos ingresados');</script>";
    }
}
