<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>La Comarca</title>
    <meta name="viewport" content="width=device-width, user-scalable=yes, initial-scale=1.0, maximum-scale=3.0, minimum-scale=1.0">
    <link rel="stylesheet" href="css/estilos.css?v33">
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
                <a style="text-decoration: none;" class="link-logo" href="index.php">
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
        <div class="container container--flex">
            <!-- Boton menu(movil) -->
            <span class="icon-menu" id="btnmenu"></span>
            <!-- Menu nav -->
            <ul class="menu" id="menu">
                <li class="menu__item"><a href="index.php" class="menu__link menu__link--select">Inicio</a></li>
                <li class="menu__item"><a href="resultados.php" class="menu__link">Ofertas</a></li>
                <li class="menu__item"><a href="crear-anuncio.php" class="menu__link">Vender</a></li>
            </ul>           
                <?php include 'php/index-nav-user.php';?>
        </div>

    </nav>

    <!-- Banner Imagen header -->
    <section class="banner">
        <img src="img/banner9.png" alt="" class="banner__img">
    </section>

    <!-- <main class="main"> -->
    <main class="container-main">
        <section class="group group--slider">
            <!-- Slider publicidad -->
            <div id="slider" class="container">
                <section> <img src="img/anuncio1.png"></section>
                <section> <img src="img/anuncio2.png"></section>
                <section> <img src="img/anuncio3.png"></section>
                <section> <img src="img/anuncio4.png"></section>
                <section> <img src="img/anuncio4.png"></section>
            </div>
            <div id="btn-anterior">&#60;</div>
            <div id="btn-siguiente">&#62;</div>
        </section>
        <!-- &#60 signo menor que -->
        <!-- &#62 signo mayor que -->


        <!-- Seccion productos ofertas -->
        <section class="group today-special fondo-oferta container container--flex-productos">

        <h2 class="group__title ">Ofertas del dia</h2>
            <div class="container container--flex-productos">
            
                
            <?php include 'php/index-productos-db.php';?>


                
            </div>
        </section>

        <!-- Seccion publicidad de dos columnas -->
        <section class="group main__about__description">
            <div class="container container--flex">

                <div class="column column--50">
                    <img src="img/imagen2.jpg" alt="">
                </div>
                <div class="column column--50">
                    <h3 class="column_title">Bienvenido</h3>
                    <p class="column_txt"> Tienes algo que ya no usas, este es tu sitio. Publica, vende todo de la manera mas comoda y rapida. </p>
                    <a href="resultados.php" class="btn btn--ofertas">Explorar</a>
                </div>
            </div>
        </section>

        <section class="group today-special fondo-oferta container container--flex-productos">

        <h2 class="group__title ">Productos</h2>
            <div class="container container--flex-productos">
            
                
            <?php include 'php/index-productos-db.php';?>


                
            </div>
        </section>

        <!-- Seccion productos -->
        <!-- <section class="group today-special">
            <h2 class="group__title">Descubre</h2>

            <div class="fondo-productos container container--flex-productos">

                <div class="caja-producto column column--50-25">
                    <img src="img/producto4.jpg" alt="" class="today-special__img">
                    <div class="today-special__title">Descubre 1</div>
                    <div class="today-special__price">$99.999</div>
                </div>
                <div class="caja-producto column column--50-25">
                    <img src="img/producto5.jpg" alt="" class="today-special__img">
                    <div class="today-special__title">Descubre 2</div>
                    <div class="today-special__price">$99.999</div>
                </div>
                <div class="caja-producto column column--50-25">
                    <img src="img/producto6.jpg" alt="" class="today-special__img">
                    <div class="today-special__title">Descubre 3</div>
                    <div class="today-special__price">$99.999</div>
                </div>
                <div class="caja-producto column column--50-25">
                    <img src="img/producto7.jpg" alt="" class="today-special__img">
                    <div class="today-special__title">Descubre 4</div>
                    <div class="today-special__price">$99.999</div>
                </div>
                <div class="caja-producto column column--50-25">
                    <img src="img/producto7.jpg" alt="" class="today-special__img">
                    <div class="today-special__title">Descubre 5</div>
                    <div class="today-special__price">$99.999</div>
                </div>
                <div class="caja-producto column column--50-25">
                    <img src="img/producto6.jpg" alt="" class="today-special__img">
                    <div class="today-special__title">Descubre 6</div>
                    <div class="today-special__price">$99.999</div>
                </div>
                <div class="caja-producto column column--50-25">
                    <img src="img/producto5.jpg" alt="" class="today-special__img">
                    <div class="today-special__title">Descubre 7</div>
                    <div class="today-special__price">$99.999</div>
                </div>
                <div class="caja-producto column column--50-25">
                    <img src="img/producto4.jpg" alt="" class="today-special__img">
                    <div class="today-special__title">Descubre 8</div>
                    <div class="today-special__price">$99.999</div>
                </div>
            </div>
        </section> -->
    </main>

    <!-- Footer -->
    <footer class="main-footer">

        <div class="container container--flex">
            <!-- 3 Columnas con flexbox -->
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
    <!-- Script del menu y del slider de productos -->
    <script src="js/menu.js"></script>
    <script src="js/slider.js"></script>

</body>

</html>