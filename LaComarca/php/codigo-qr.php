<?php

require 'phpqrcode/qrlib.php';
$idUsuarioLog = $_GET["idUsuario"];

$dir = 'temp/';

if(!file_exists($dir)){
    mkdir($dir);
}

$filename = $dir.'test.png';
$tamano =10;
$level = 'M';
$frameSize = 3;
$contenido = "localhost/Comarca/LaComarca1/publicaciones-comprador.php?idUsuario=$idUsuarioLog";

QRcode::png($contenido, $filename, $level, $tamano, $frameSize);

echo "<img class='qr-code' src='".$filename."'>";
?>