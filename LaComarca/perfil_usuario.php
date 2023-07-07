<?php

session_start();

if (!isset($_SESSION['perfil'])) {
    echo '
            <script>
                alert("Porfavor, debes iniciar sesión");
                window.location = "cuenta.php";
            </script>
        ';
    session_destroy();
    die();
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>La Comarca</title>
    <meta name="viewport" content="width=device-width, user-scalable=yes, initial-scale=1.0, maximum-scale=3.0, minimum-scale=1.0">

    <link rel="stylesheet" href="css/estilos.css?12">
    <link rel="stylesheet" href="css/perfil_usuario.css?12">
    <link href="https://file.myfontastic.com/M5cEzXkWWw5QGJmPEw8uAA/icons.css" rel="stylesheet">
    <script src="js/jquery-3.6.0.min.js"></script>

</head>

<body>
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


            <?php
            $conexion = mysqli_connect('localhost', 'root', '', 'la_comarca');
            include 'php/index-nav-user.php';
            ?>

        </div>

    </nav>
    <!-- Banner -->
    <section class="banner">
        <img src="img/banner9.png" alt="" class="banner__img">
    </section>



    <main class="container-main">

        <section class="Perfil-seccion main__about__description">
            <div class="container flex-perfil">



                <div class="columna1 column column--50">
                    <!-- Boton menu(movil) -->
                    <span class="icon-angle-down" id="btn-nav-usuario"></span>
                    <!-- Menu nav perfil-->
                    <ul class="menu-usuario selecciones" id="menu-usuario">



                        <?php include 'php/perfil-administrador.php'; ?>
                        <li class="nav-usuario"><a href="#" class="perfil-menu__link">Información de la cuenta</a></li>
                        <li class="nav-usuario"><?php echo "<a href='publicaciones-comprador.php?idUsuario=" . $id_user . "' class='perfil-menu__link'>Mis compras</a>" ?></li>
                        <li class="nav-usuario"><?php echo "<a href='publicaciones-usuario.php?idUsuario=" . $id_user . "' class='perfil-menu__link'>Mis ventas</a>" ?></li>
                        <li class="nav-usuario"><span class="delimiter"></span></li>
                        <li class="nav-usuario"><a href="modificar-seguridad.php" class="perfil-menu__link">Seguridad</a></li>
                        <li class="nav-usuario"><a href="modificar-perfil.php" class="perfil-menu__link">Modificar mis datos</a></li>
                        <li class="nav-usuario"><span class="delimiter"></span></li>
                        <li class="nav-usuario"><a href="perfil-direcciones.php" class="perfil-menu__link">Mis direcciones</a></li>
                    </ul>
                </div>

                <?php include 'php/perfil-usuario-info.php'; ?>

                <?php include 'php/perfil-usuario-direcciones.php'; ?>


                
            </div>

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
    <script src="js/menu-usuario.js"></script>

</body>

</html>