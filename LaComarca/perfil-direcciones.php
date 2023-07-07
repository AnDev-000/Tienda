<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>La Comarca</title>
    <meta name="viewport" content="width=device-width, user-scalable=yes, initial-scale=1.0, maximum-scale=3.0, minimum-scale=1.0">

    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="css/perfil_usuario.css?v10">
    <link rel="stylesheet" href="css/perfil-direcciones.css?v10">
    <link rel="stylesheet" href="https://necolas.github.io/normalize.css/8.0.1/normalize.css">
    <link href="https://file.myfontastic.com/M5cEzXkWWw5QGJmPEw8uAA/icons.css" rel="stylesheet">
    <script src="js/jquery-3.6.0.min.js"></script>
    <!-- Para este formulario se esta ocupando las validaciones de js/validacionForm.js-->
</head>

<body>
    <?php
    include 'php/conexion_be.php';
    session_start();

    if (isset($_SESSION['perfil'])) {
    } else {
        header("location: cuenta.php");
    }

    ?>
    <header class="main-header">
        <div class="container container--flex">

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

            <?php include 'php/index-nav-user.php';?>

        </div>

    </nav>

    <section class="banner">
        <img src="img/banner9.png" alt="" class="banner__img">
    </section>



    <main class="container-main">

        <section class="Perfil-seccion main__about__description">
            <div class="container flex-perfil">

                <div class="columna1 column column--50">

                    <span class="icon-angle-down" id="btn-nav-usuario"></span>

                    <ul class="menu-usuario selecciones" id="menu-usuario">
                    <?php include 'php/perfil-administrador.php'; ?>

                        <li class="nav-usuario"><a href="perfil_usuario.php" class="perfil-menu__link">Información de la cuenta</a></li>
                        <li class="nav-usuario"><?php echo "<a href='publicaciones-comprador.php?idUsuario=" . $id_user . "' class='perfil-menu__link'>Mis compras</a>" ?></li>
                        <li class="nav-usuario"><?php echo "<a href='publicaciones-usuario.php?idUsuario=" . $id_user . "' class='perfil-menu__link'>Mis ventas</a>" ?></li>
                        <li class="nav-usuario"><span class="delimiter"></span></li>
                        <li class="nav-usuario"><a href="modificar-seguridad.php" class="perfil-menu__link">Seguridad</a></li>
                        <li class="nav-usuario"><a href="modificar-perfil.php" class="perfil-menu__link">Modificar mis datos</a></li>
                        <li class="nav-usuario"><span class="delimiter"></span></li>
                        <li class="nav-usuario"><a href="perfil-direcciones.php" class="perfil-menu__link">Mis direcciones</a></li>
                    </ul>
                </div>


                <div class="columna2 column column--50">

                    <form name="formulario__direcciones" class="formulario__direcciones" id="formulario__direcciones" method="POST" action="php/perfil-direcciones.php" onSubmit="return valida();">


                        <fieldset class="misDirecciones">
                            <!-- Formulario -->
                            <legend class="legend"><span>Dirección</span></legend><br>



                            <div class="direcciones__grupo" id="grupo__nombre">
                                <label class="label" for="nombre"><span>Nombre</span></label>
                                <div class="direcciones__grupo-input">
                                    <input class="direcciones__input" type="text" name="nombre" id="nombre" value="" title="Nombre" required>
                                    <i class="direcciones__validacion-estado fas fa-times-circle"></i>
                                </div>
                                <p class="direcciones__input-error">El nombre solo debe contener letras.</p>

                            </div>

                            <div class="direcciones__grupo" id="grupo__direccion">
                                <label class="label" for="direccion"><span>Direccion</span></label>
                                <div class="direcciones__grupo-input">
                                    <input class="direcciones__input" type="text" name="direccion" id="direccion" value="" title="Direccion" required>
                                    <i class="direcciones__validacion-estado fas fa-times-circle"></i>
                                </div>
                                <p class="direcciones__input-error">El nombre solo debe contener letras.</p>
                            </div>

                            <div class="direcciones__grupo" id="grupo__numero">
                                <label class="label" for="numero"><span>Numero</span></label>
                                <div class="direcciones__grupo-input">
                                    <input class="direcciones__input" type="text" name="numero" id="numero" value="" title="Numero" required>
                                    <i class="direcciones__validacion-estado fas fa-times-circle"></i>
                                </div>
                                <p class="direcciones__input-error">El nombre solo debe contener letras.</p>
                            </div>


                            <div class="region-dir">
                                <label class="label" for="region">
                                    <span>Región</span>
                                </label>
                                <div class="control">
                                    <select id="" name="region" title="Región" class="region-select" defaultvalue="001" style="display: inline-block;">
                                        <option value="001" selected="selected">Por favor seleccione región, estado o provincia.</option>
                                        <option value="Tarapaca">Tarapaca</option>
                                        <option value="Antofagasta">Antofagasta</option>
                                        <option value="Atacama">Atacama</option>
                                        <option value="Coquimbo">Coquimbo</option>
                                        <option value="Valparaiso">Valparaiso</option>
                                        <option value="Libertador Gral Bernardo OHiggins">Libertador Gral Bernardo O'Higgins</option>
                                        <option value="Maule">Maule</option>
                                        <option value="BioBio">BioBio</option>
                                        <option value="La Araucania">La Araucania</option>
                                        <option value="Los Lagos">Los Lagos</option>
                                        <option value="Gral Carlos Ibanez del Campo">Gral Carlos Ibanez del Campo</option>
                                        <option value="Magallanes y Antartica Chilena">Magallanes y Antartica Chilena</option>
                                        <option value="Metropolitana">Metropolitana</option>
                                        <option value="Region de los Rios">Region de los Rios</option>
                                        <option value="Arica y Parinacota">Arica y Parinacota</option>
                                        <option value="Ñuble">Ñuble</option>
                                    </select>
                                </div>
                            </div>

                            <div class="direcciones__grupo" id="grupo__comuna">
                                <label class="label" for="comuna"><span>Comuna</span></label>
                                <div class="direcciones__grupo-input">
                                    <input class="direcciones__input" type="text" name="comuna" id="comuna" value="" title="Comuna" required>
                                    <i class="direcciones__validacion-estado fas fa-times-circle"></i>
                                </div>
                                <p class="direcciones__input-error">El nombre solo debe contener letras.</p>
                            </div>



                            <div class="direcciones__grupo" id="grupo__cPostal">
                                <label class="label" for="cPostal"><span>Codigo Postal</span></label>
                                <div class="direcciones__grupo-input">
                                    <input class="direcciones__input" type="text" name="cPostal" id="cPostal" value="" title="cPostal" required>
                                    <i class="direcciones__validacion-estado fas fa-times-circle"></i>
                                </div>
                                <p class="direcciones__input-error">El nombre solo debe contener letras.</p>
                            </div>





                        </fieldset>

                        <div class="botonesAccion">
                            <div class="btn-izquierda">
                                <button type="submit" class="btn-enviar" id="btnEnviar" title="Guardar">
                                    <span>Guardar</span>
                                </button>
                            </div>
                            <div class="btn-derecha">
                                <button type="reset" class="btn-reset" id="btnReset" title="Limpiar">
                                    <span>Limpiar</span>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>

    </main>


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

    <script src="js/menu.js"></script>
    <script src="js/menu-usuario.js"></script>
    <script src="js/validacionModificarDirecciones.js"></script>
    <script src="https://kit.fontawesome.com/2c36e9b7b1.js" crossorigin="anonymous"></script>

</body>

</html>