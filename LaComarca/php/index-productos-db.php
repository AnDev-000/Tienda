<?php

                $conexion = mysqli_connect('localhost', 'root', '', 'la_comarca');


                $consulta = "SELECT * FROM publicacion";

                //crea un array si encuentra la imagen con el correo
                $resultado = mysqli_query($conexion, $consulta);

                

                if (mysqli_num_rows($resultado) > 0) {
                    while($fila = mysqli_fetch_assoc($resultado)){
                        
                        $idPublicacion= $fila["id_publicacion"];
                        $imagen= $fila["imagen"];
                        $titulo= $fila["titulo"];
                        $precio= $fila["precio"];
                        $estado= $fila["estado"];

                        
                        if($estado=='activo'){
                            echo "
                        <div class='caja-producto column column--30'>
                            <a href='publicacion.php?idPublic=" . $idPublicacion . "' style='text-decoration: none;'>
                                <img class='today-special__img' alt='' src='/Comarca/LaComarca1/img publicacion/". $imagen. "'>
                                <div class='today-special__title'>" . $titulo . "</div>
                                <div class='today-special__price'>$" . $precio . "</div>
                            </a>
                        </div>";

                        }
                        
                    }
                } 
                ?>