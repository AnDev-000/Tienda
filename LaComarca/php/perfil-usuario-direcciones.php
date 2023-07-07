<?php

                echo "<div class='caja caja-direccion-facturacion'>
                    <strong class='caja-titulo'>
                        <span>Dirección de envio por defecto</span>
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

                $miconsulta = "SELECT * FROM direcciones WHERE idperfil_user ='$id_user'";

                if ($resultado = mysqli_query($conexion, $miconsulta)) {

                    while ($registro = mysqli_fetch_assoc($resultado)) {


                        echo "<address> Nombre: " . $registro['nombre'] . "</address>";

                        echo "<address> Calle: " . $registro['direccion'] . "</address>";

                        echo "<address> Numero de casa: " . $registro['numero'] . "</address>";

                        echo "<address>" . $registro['comuna'] . ", " . $registro['region'] . ", " . $registro['codigoPostal'] . "</address>";
                    }
                }

                echo "</div>
                        <div class='caja-accion'>
                        <a class='accion editar' href='perfil-direcciones.php'><span>Editar dirección</span></a>
                        </div>
                        </div>";

                ?>