<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>La Comarca</title>
    <meta name="viewport" content="width=device-width, user-scalable=yes, initial-scale=1.0, maximum-scale=3.0, minimum-scale=1.0">

    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="css/publicacion.css?v21">
    <link href="https://file.myfontastic.com/M5cEzXkWWw5QGJmPEw8uAA/icons.css" rel="stylesheet">
    <script src="js/jquery-3.6.0.min.js"></script>
</head>

<body>
    <?php
    include 'php/conexion_be.php';
    session_start();
    if (isset($_SESSION['perfil'])) {
        $id = $_SESSION['perfil'];
    }


    ?>
    <header class="main-header">
        <div class="container container--flex">
            <!-- Logo -->
            <div class="logo-container column column--30">
                <a style="text-decoration: none;" href="index.php">
                    <h1 class="logo">La Comarca</h1>
                </a>
            </div>
            <!-- Buscador -->
            <form class="main-header__SearchText column column--70" action="resultados.php" method="POST">
                    <input type="text" name="buscar" class="searchText" placeholder="¿Que estas buscando... " autocomplete="off">
                    <button class="boton-buscar" type="submit" name="Buscar" value="Buscar" >
                    </button>
            </form>

        </div>
    </header>

    <nav class="main-nav">

        <!-- contenedor y flexbox -->
        <div class="container container--flex">

            <!-- Icono boton menu (Vista movil)-->
            <span class="icon-menu" id="btnmenu"></span>

            <!-- Lista Menu -->
            <ul class="menu" id="menu">
                <li class="menu__item"><a href="index.php" class="menu__link menu__link--select">Inicio</a></li>
                <li class="menu__item"><a href="resultados.php" class="menu__link">Ofertas</a></li>
                <!-- <li class="menu__item"><a href="pag-error.php" class="menu__link">Categoria</a></li> -->
                <!-- <li class="menu__item"><a href="pag-error.php" class="menu__link">Historial</a></li> -->
                <!-- <li class="menu__item"><a href="pag-error.php" class="menu__link">Favoritos</a></li> -->
                <li class="menu__item"><a href="crear-anuncio.php" class="menu__link">Vender</a></li>
                <!-- <li class="menu__item"><a href="pag-error.php" class="menu__link">Subasta</a></li> -->
                <!-- <li class="menu__item"><a href="perfil_usuario.php" class="menu__link">Ayuda</a></li> -->
            </ul>

            <?php include 'php/index-nav-user.php'; ?>

        </div>
    </nav>

    <!-- Banner Imagen header -->
    <section class="banner">
        <img src="img/banner9.png" alt="" class="banner__img">
    </section>

    <main class="container-main">

        <section class="Perfil-seccion main__about__description">
            <div class="container flex-perfil">

                <?php



                $idPublic = $_GET["idPublic"];

                $consulta = "SELECT idperfil_user FROM publicacion WHERE id_publicacion = '$idPublic'";

                //crea un array si encuentra la imagen con el correo
                $resultado = mysqli_query($conexion, $consulta);

                while ($fila = mysqli_fetch_array($resultado)) {

                    $id_vendedor = $fila["idperfil_user"];
                }







                $miconsulta = "SELECT * FROM publicacion WHERE id_publicacion ='$idPublic'";

                if ($resultado = mysqli_query($conexion, $miconsulta)) {

                    while ($registro = mysqli_fetch_assoc($resultado)) {

                        $estado = $registro["estado"];

                        if ($estado == 'activo') {
                            echo "<!-- Columna 1 info producto -->
                        <div class='columna1 column column--50'>
                            <!-- Contenedores Flex-wrap -->
                            <div class='contenido1'>
                            <img class='imagen-producto' src='/Comarca/LaComarca1/img publicacion/" . $registro['imagen'] . "'>
                            </div>
                            <div class='contenido2'>
                                <div>
                                    <a href='#description' class='titulo-producto'><span>" . $registro['titulo'] . "</span></a>
                                </div>
                                <div>
                                    <span>Tipo: " . $registro['tipo_producto'] . "</span>
                                </div>
                                <div>
                                    <span>Categoria: " . $registro['categoria'] . "</span>
                                </div>
                                <div>
                                    <span>$" . $registro['precio'] . "</span>
                                </div>
                            </div>
                            <div class='contenido3'>
                                <button type='submit' title='Comprar' class='btn-comprar' id=''>
                                    <a href='prueba-comprar.php?idPublic=" . $idPublic . "&idVendedor=" . $id_vendedor . "'>Comprar</a>
                                </button>
                            </div>
                            <div class='contenido4'>
                                <div class='caja-titulo-descripcion-condicion'>
                                    <a class='titulo-descripcion-condicion' tabindex='-1' data-toggle='switch' href='#description-condicion' id='tab-label-description-title'>
                                        <span>Condicion actual del producto</span>
                                    </a>
                                </div>
                                <div class='caja-descripcion-condicion' id='description' data-role='content' aria-labelledby='tab-label-description' role='tabpanel' aria-hidden='false'>
                                    <p>" . $registro['condicion'] . "</p>
                                </div>
                            </div>
                            <div class='contenido5'>
                                <div class='caja-titulo-descripcion'>
                                    <a class='titulo-descripcion' tabindex='-1' data-toggle='switch' href='#description' id='tab-label-description-title'>
                                        <span>Descripción</span>
                                    </a>
                                </div>
                                <div class='caja-descripcion' id='description' data-role='content' aria-labelledby='tab-label-description' role='tabpanel' aria-hidden='false'>
                                    <p>" . $registro['desc_tecnica'] . "</p>
                                </div>
                            </div>
                            <!-- Contenedores Flex-wrap -->
                        </div>";
                        } elseif ($estado == 'inactivo') {

                            echo "<!-- Columna 1 info producto -->
                        <div class='columna1 column column--50'>
                            <!-- Contenedores Flex-wrap -->
                            <div class='contenido1'>
                            <img class='imagen-producto' src='/Comarca/LaComarca1/img publicacion/" . $registro['imagen'] . "'>
                            </div>
                            <div class='contenido2'>
                                <div>
                                    <a href='#description' class='titulo-producto'><span>" . $registro['titulo'] . "</span></a>
                                </div>
                                <div>
                                    <span>Tipo: " . $registro['tipo_producto'] . "</span>
                                </div>
                                <div>
                                    <span>Categoria: " . $registro['categoria'] . "</span>
                                </div>
                                <div>
                                    <span>$" . $registro['precio'] . "</span>
                                </div>
                            </div>
                            <div class='contenido3'>
                                <button type='submit' title='Comprar' class='btn-comprar' id=''>
                                    Vendido
                                </button>
                            </div>
                            <div class='contenido4'>
                                <div class='caja-titulo-descripcion-condicion'>
                                    <a class='titulo-descripcion-condicion' tabindex='-1' data-toggle='switch' href='#description-condicion' id='tab-label-description-title'>
                                        <span>Condicion actual del producto</span>
                                    </a>
                                </div>
                                <div class='caja-descripcion-condicion' id='description' data-role='content' aria-labelledby='tab-label-description' role='tabpanel' aria-hidden='false'>
                                    <p>" . $registro['condicion'] . "</p>
                                </div>
                            </div>
                            <div class='contenido5'>
                                <div class='caja-titulo-descripcion'>
                                    <a class='titulo-descripcion' tabindex='-1' data-toggle='switch' href='#description' id='tab-label-description-title'>
                                        <span>Descripción</span>
                                    </a>
                                </div>
                                <div class='caja-descripcion' id='description' data-role='content' aria-labelledby='tab-label-description' role='tabpanel' aria-hidden='false'>
                                    <p>" . $registro['desc_tecnica'] . "</p>
                                </div>
                            </div>
                            <!-- Contenedores Flex-wrap -->
                        </div>";
                        }
                    }
                }

                ?>



                <!-- Columna 2 Perfil usuario publicacion -->
                <div class="columna2 column column--50">

                    <?php


                    $consulta = "SELECT idperfil_user FROM publicacion WHERE id_publicacion = '$idPublic'";

                    //crea un array si encuentra la imagen con el correo
                    $resultado = mysqli_query($conexion, $consulta);

                    while ($fila = mysqli_fetch_array($resultado)) {

                        $id_user = $fila["idperfil_user"];
                    }

                    $consulta = "SELECT * FROM direcciones WHERE idperfil_user = '$id_user'";

                    //crea un array si encuentra la imagen con el correo
                    $resultado = mysqli_query($conexion, $consulta);

                    while ($fila = mysqli_fetch_array($resultado)) {

                        $comuna_user = $fila["comuna"];
                        $region_user = $fila["region"];
                    }





                    $consulta = "SELECT * FROM perfil WHERE idperfil_user = '$id_user'";

                    //crea un array si encuentra la imagen con el correo
                    $resultado = mysqli_query($conexion, $consulta);

                    if (mysqli_num_rows($resultado) > 0) {
                        while ($registro = mysqli_fetch_assoc($resultado)) {

                            echo "    <!-- Contenedores -->
                    <div class='caja-img'>
                     <img class='img-user' src='/Comarca/LaComarca1/img usuario/" . $registro['imagen'] . "'>
                    </div>

                    <div class='caja-descripcion-user'>
                        <div>
                            <a class='titulo-presentacion-usuario'>
                                <span>Informacion vendendor</span>
                            </a>
                        </div>

                        <p>Nombre: " . $registro['nombre'] . " " . $registro['apellido'] . "</p>

                        <p>Ubicacion: " . $region_user . ", " . $comuna_user . "</p>
                    </div>";
                        }
                    }


                    ?>




                    <?php

                    require 'phpqrcode/qrlib.php';

                    $dir = 'temp/';

                    if (!file_exists($dir)) {
                        mkdir($dir);
                    }

                    $filename = $dir . 'test.png';
                    $tamano = 10;
                    $level = 'M';
                    $frameSize = 3;
                    $contenido = "localhost/Comarca/LaComarca1/publicaciones-usuario.php?idUsuario=$id_user";

                    QRcode::png($contenido, $filename, $level, $tamano, $frameSize);

                    echo "
                
                
                <div class='caja-qr'>
                        <div class='titulo-qr'>
                            <span>Tarjeta:</span>
                        </div>
                        <img class='qr-code' src='" . $filename . "'>
                    </div>
                </div>";






                    ?>







                </div>
        </section>
    </main>

    <!-- Footer -->
    <footer class="main-footer">

        <div class="container container--flex">

            <div class="column column--33">
                <h2 class="column__title">¿Quienes somos?</h2>
                <p class="column__txt">Somos un grupo de jovenes, haciendo su mejor esfuerzo</p>
            </div>
            <div class="column column--33">
                <h2 class="column__title">Contactanos</h2>
                <p class="column__txt">Av.Falsa 123, torre gemela 1, piso 69,Providencia,Santiago - Chile</p>
                <p class="column__txt">Tel:56228010000</p>
                <p class="column__txt">consultas@lacomarca.cl</p>
            </div>
            <div class="column column--33">
                <h2 class="column__title">Siguenos en nuestras redes</h2>
                <p class="column__txt"><a href="" class="icon-facebook">Facebook</a></p>
                <p class="column__txt"><a href="" class="icon-twitter">Síguenos en Twitter</a></p>
                <p class="column__txt"><a href="" class="icon-youtube">Visita nuestro canal</a></p>
            </div>
        </div>

        <p class="copy">Copyright © 2021 La Comarca Chile Ltda.</p>

    </footer>

    <!-- Script Menu nav, Menu perfil usuario -->
    <script src="js/menu.js"></script>
    <!-- <script src="js/menu-usuario.js"></script> -->

</body>

</html>