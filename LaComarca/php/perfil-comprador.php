<?php

$conexion = mysqli_connect('localhost', 'root', '', 'la_comarca');

$idUsuarioLog = $_GET["idUsuario"];


$consulta = "SELECT * FROM venta WHERE id_comprador= $idUsuarioLog";

//crea un array si encuentra la imagen con el correo
$resultado = mysqli_query($conexion, $consulta);

if (mysqli_num_rows($resultado) > 0) {
    while ($fila = mysqli_fetch_assoc($resultado)) {
        $id_publicacion = $fila['id_productovendido'];

        $consulta2 = "SELECT * FROM publicacion WHERE id_publicacion= $id_publicacion";
        $resultado2 = mysqli_query($conexion, $consulta2);
        if (mysqli_num_rows($resultado2) > 0) {
            $id_publicacion;
            while ($fila = mysqli_fetch_assoc($resultado2)) {
                
                $idPublicacion= $fila["id_publicacion"];
                $imagen = $fila["imagen"];
                $titulo = $fila["titulo"];
                $tipoProducto = $fila["tipo_producto"];
                $categoria = $fila["categoria"];
                $ubicacion_venta = $fila["ubicacion_venta"];
                $precio = $fila["precio"];
                $condicion = $fila["condicion"];
                $estado= $fila["estado"];

                if ($estado == 'inactivo') {


                    echo "
                        
                        
                    <!-- Contenedor producto -->
                    <div class='item-resultado'>
                            <div class='item-imagen'>
                                <img src='img publicacion/" . $imagen . "' alt=''>
                            </div>
                            <div class='item-texto'>
                                <a href='publicacion.php?idPublic=" . $id_publicacion . "' class='articulo-busq-titulo'>" . $titulo . "</a>
                                <div class='articulo-busq-tipo'>Tipo: " . $tipoProducto . "</div>
                                <p class='articulo-busq-descripcion_corta'>" . $ubicacion_venta . "</p>
                                <p class='articulo-busq-descripcion_corta'>" . $condicion . "</p>
                                <div class='articulo-busq-precio'>$" . $precio . "</div>
                                <button type='button' class='btn-ver' id='btn_ver'>
                                PRODUCTO VENDIDO
                                </button>
                            </div>
                    </div>";
                }
            }
        }
    }
}
