
<?php

echo "<div class='social-icon'>
        <!-- botones acceso cuenta -->
        <div>";

        if (isset($_SESSION['perfil'])) {
            echo"<a href='cuenta.php' class='menu_sesion-inactivo' id='iniciarsesion'>Iniciar Sesion</a>
            <a href='php/cerrar_sesion.php' class='menu_sesion-activo' id='desconectar'>Desconectar</a>";
        } else {
            echo"<a href='cuenta.php' class='menu_sesion-activo' id='iniciarsesion'>Iniciar Sesion</a>
            <a href='php/cerrar_sesion.php' class='menu_sesion-inactivo' id='desconectar'>Desconectar</a>";
        }
        echo "</div>";





if (isset($_SESSION['perfil'])) {

    $id = $_SESSION['perfil'];

    $consulta = "SELECT idperfil_user FROM perfil WHERE correo_electronico = '$id'";

    $resultado = mysqli_query($conexion, $consulta);

    while ($fila = mysqli_fetch_array($resultado)) {

        $id_user = $fila["idperfil_user"];
    }

    $miconsulta = "SELECT * FROM perfil WHERE idperfil_user ='$id_user'";

    if ($resultado = mysqli_query($conexion, $miconsulta)) {

        while ($registro = mysqli_fetch_assoc($resultado)) {


            echo "<a href='perfil_usuario.php' class='social-icon__link'>
                                    <img class='icon-usuario' src='/Comarca/LaComarca1/img usuario/" . $registro['imagen'] . "'>
                                            </a>";


            echo "<a href='perfil_usuario.php' class='social-nom__link'><span class='nom-user'>"
                . $registro['nombre'] . " " . $registro['apellido'] . "</span></a>";


            //echo "<address> Nombre: " . $registro['nombre'] . "</address>";

            //echo "<address> Apellido: " . $registro['apellido'] . "</address>";

            //echo "<address> Correo Electronico: " . $registro['correo_electronico'] . "</address>";
        }
    }
} else {
    echo "<a href='perfil_usuario.php' class='social-icon__link-inactivo'></a>";
    echo "<a href='perfil_usuario.php' class='social-nom__link'-inactivo></a>";
}
echo "</div>";
?>