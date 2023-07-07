<?php

include 'conexion_be.php';

if (!isset($_POST['buscar'])) {
    $_POST['buscar'] = "";
    $busqueda = $_POST['buscar'];
}

$busqueda = $_POST['buscar'];

$SQL_READ = " SELECT * FROM publicacion WHERE id_publicacion LIKE '%".$busqueda."%'
            OR estado LIKE '%".$busqueda."%'
            OR titulo LIKE '%".$busqueda."%'
            OR condicion LIKE '%".$busqueda."%' OR tipo_producto LIKE '%".$busqueda."%'
            OR categoria LIKE '%".$busqueda."%' OR ubicacion_venta LIKE '%".$busqueda."%'
            OR imagen LIKE '%".$busqueda."%' OR desc_tecnica LIKE '%".$busqueda."%' OR precio LIKE '%".$busqueda."%'";

$resultado_read = mysqli_query($conexion, $SQL_READ);
