<?php

$conexion = mysqli_connect('localhost', 'root', '', 'la_comarca');

$idUsuarioLog= $_GET["idUsuario"];

$consulta = "SELECT * FROM publicacion WHERE idperfil_user= $idUsuarioLog";

//crea un array si encuentra la imagen con el correo
$resultado = mysqli_query($conexion, $consulta);

if (mysqli_num_rows($resultado) > 0) {
    while ($fila = mysqli_fetch_assoc($resultado)) {

        $idPublicacion= $fila["id_publicacion"];
        $imagen = $fila["imagen"];
        $titulo = $fila["titulo"];
        $tipoProducto = $fila["tipo_producto"];
        $categoria = $fila["categoria"];
        $ubicacion_venta = $fila["ubicacion_venta"];
        $precio = $fila["precio"];
        $condicion = $fila["condicion"];
        $estado= $fila["estado"];

        if($estado=='activo'){


        echo "
                    <!-- Contenedor producto -->
                    <div class='item-resultado'>
                            <div class='item-imagen'>
                                <img src='img publicacion/" . $imagen . "' alt=''>
                            </div>
                            <div class='item-texto'>
                                <a href='publicacion.php?idPublic=" . $idPublicacion . "' class='articulo-busq-titulo'>" . $titulo . "</a>
                                <div class='articulo-busq-tipo'>Tipo: " . $tipoProducto . "</div>
                                <p class='articulo-busq-descripcion_corta'>" . $ubicacion_venta . "</p>
                                <p class='articulo-busq-descripcion_corta'>" . $condicion . "</p>
                                <div class='articulo-busq-precio'>$" . $precio . "</div>
                                <button type='button' class='btn-ver' id='btn_ver'>
                                <a href='publicacion.php?idPublic=" . $idPublicacion . "'>Ver publicacion</a>
                                </button>
                            </div>
                    </div>";
        }elseif($estado=='inactivo'){

            echo "
                    <!-- Contenedor producto -->
                    <div class='item-resultado'>
                            <div class='item-imagen'>
                                <img src='img publicacion/" . $imagen . "' alt=''>
                            </div>
                            <div class='item-texto'>
                                <a href='publicacion.php?idPublic=" . $idPublicacion . "' class='articulo-busq-titulo'>" . $titulo . "</a>
                                <div class='articulo-busq-tipo'>Tipo: " . $tipoProducto . "</div>
                                <p class='articulo-busq-descripcion_corta'>" . $ubicacion_venta . "</p>
                                <p class='articulo-busq-descripcion_corta'>" . $condicion . "</p>
                                <div class='articulo-busq-precio'>$" . $precio . "</div>
                                <button type='button' class='btn-ver' id='btn_ver'>
                                PRODUCTO VENDIDO
                                </button>
                            </div>
                            
                    </div>
                        
                    ";
        }
    }
}
