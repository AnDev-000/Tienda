<?php


$conexion = mysqli_connect('localhost', 'root', '', 'la_comarca');

if (isset($_SESSION['perfil'])) {
} else {
    header("location: cuenta.php");
}

$id = $_SESSION['perfil'];



$consulta = "SELECT * FROM perfil WHERE correo_electronico = '$id'";


//crea un array si encuentra la imagen con el correo
$resultado = mysqli_query($conexion, $consulta);

while ($fila = mysqli_fetch_array($resultado)) {

    $tipoUsuario = $fila["tipo_usuario"];
}
if($tipoUsuario== 2){

    echo"
    <li class='nav-usuario'><a href='administrador.php' class='perfil-menu__link'>Sitio de administrador</a></li>";
    
}
