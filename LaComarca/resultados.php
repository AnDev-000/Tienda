<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>La Comarca</title>
    <meta name="viewport" content="width=device-width, user-scalable=yes, initial-scale=1.0, maximum-scale=3.0, minimum-scale=1.0">
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="css/resultados.css?v28">
    <link href="https://file.myfontastic.com/M5cEzXkWWw5QGJmPEw8uAA/icons.css" rel="stylesheet">
    <script src="js/jquery-3.6.0.min.js"></script>

</head>

<body>

<?php 
    include 'php/conexion_be.php';
    session_start();
    if(isset($_SESSION['perfil'])){
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

    <!-- Navegador menu -->
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
                <!-- <li class="menu__item"><a href="pag-error.php" class="menu__link">Subasta</a></li>
                <li class="menu__item"><a href="perfil_usuario.php" class="menu__link">Ayuda</a></li> -->
            </ul>

            <?php include 'php/index-nav-user.php';?>

        </div>

    </nav>

    <!-- Imagen fondo header -->
    <section class="banner">
        <img src="img/banner9.png" alt="" class="banner__img">
    </section>


    <!-- PAGINA -->
    <main class="container-main container">

        <section class="group main__about__description">
            <div class="container container--flex">
                <!-- Columna 1 Filtros -->
                <!-- <div class="columna1 column column--50">
                </div> -->

                <!-- Columna 2 resultado producto -->
                <div class="columna2 column column--50">
                    
                    <?php
                    include 'php/resultados-buscar.php';

                    while ($row = mysqli_fetch_array($resultado_read)){

                        if($row['estado']== 'activo'){

                        

                    echo "

                    
                    
                    <!-- Contenedor producto -->
                    <div class='item-resultado'>
                        
                            <div class='item-imagen'>
                                <img src='img publicacion/" . $row['imagen'] . "' alt=''>
                            </div>
                            <div class='item-texto'>
                                <a href='publicacion.php?idPublic=" . $row['id_publicacion'] . "' class='articulo-busq-titulo'>" . $row['titulo'] . "</a>
                                <div class='articulo-busq-tipo'>Tipo: " . $row['tipo_producto'] . "</div>
                                <p class='articulo-busq-descripcion_corta'>" . $row['ubicacion_venta'] . "</p>
                                <p class='articulo-busq-descripcion_corta'>" . $row['condicion'] . "</p>
                                <div class='articulo-busq-precio'>$" . $row['precio'] . "</div>
                                <button type='button' class='btn-ver' id='btn_ver'>
                                <a href='publicacion.php?idPublic=" . $row['id_publicacion'] . "'>Ver publicacion</a>
                                </button>
                            </div>
                        
                        
                    </div>";
                        }
                    }
                    ?>
                </div>

            </div>
        </section>
    </main>
    <!-- PAGINA -->

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
    <!-- Script Menu nav -->
    <script src="js/menu.js"></script>
</body>

</html>