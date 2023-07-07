<?php

                echo "<div class='columna2 column column--50'>
                            <!-- Cajas info -->
                            <div class='caja caja-informacion'>
                                <strong class='caja-titulo'>
                                    <span>Información del contacto</span>
                                </strong>
                                <div class='caja-contenido'>";

                $conexion = mysqli_connect('localhost', 'root', '', 'la_comarca');

                if (isset($_SESSION['perfil'])) {
                } else {
                    header("location: cuenta.php");
                }

                $id = $_SESSION['perfil'];

                $consulta = "SELECT idperfil_user FROM perfil WHERE correo_electronico = '$id'";

                //crea un array si encuentra la imagen con el correo
                $resultado = mysqli_query($conexion, $consulta);

                while ($fila = mysqli_fetch_array($resultado)) {

                    $id_user = $fila["idperfil_user"];
                }

                $miconsulta = "SELECT * FROM perfil WHERE idperfil_user ='$id_user'";

                if ($resultado = mysqli_query($conexion, $miconsulta)) {

                    while ($registro = mysqli_fetch_assoc($resultado)) {


                        echo "<address> Nombre: " . $registro['nombre'] . "</address>";

                        echo "<address> Apellido: " . $registro['apellido'] . "</address>";

                        echo "<address> Correo Electronico: " . $registro['correo_electronico'] . "</address>";
                    }
                }

                echo "</div>
                    <div class='caja-accion'>
                        <a class='accion editar' href='modificar-perfil.php'><span>Editar </span></a>
                        <a href='modificar-seguridad.php' class='accion cambiar-contraseña'>Cambiar la contraseña</a>
                    </div>
                    </div>";

                ?>
