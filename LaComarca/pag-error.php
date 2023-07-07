<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>La Comarca</title>
    <meta name="viewport" content="width=device-width, user-scalable=yes, initial-scale=1.0, maximum-scale=3.0, minimum-scale=1.0">
    
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="css/pag-error.css">
    
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
                <a style="text-decoration: none;" class="link-logo" href="index.php"><h1 class="logo">La Comarca</h1></a>
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
                <!-- <li class="menu__item"><a href="pag-error.php" class="menu__link">Categoria</a></li> -->
                <!-- <li class="menu__item"><a href="pag-error.php" class="menu__link">Historial</a></li> -->
                <!-- <li class="menu__item"><a href="pag-error.php" class="menu__link">Favoritos</a></li> -->
                <li class="menu__item"><a href="crear-anuncio.php" class="menu__link">Vender</a></li>
                <!-- <li class="menu__item"><a href="pag-error.php" class="menu__link">Subasta</a></li> -->
                <!-- <li class="menu__item"><a href="perfil_usuario.php" class="menu__link">Ayuda</a></li> -->
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
        
        <section class="container flex-anuncio">
            <div class="mensaje-pag">
                <div class="titulo">
                    <h1>Página En Mantenimiento</h1>
                </div>
                <br>
                <h3>Estamos trabando para lograr llevar a usted la mejor experiencia  :)</h3>
            </div>
        </section>

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