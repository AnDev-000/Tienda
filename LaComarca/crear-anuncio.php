<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>La Comarca</title>
    <meta name="viewport" content="width=device-width, user-scalable=yes, initial-scale=1.0, maximum-scale=3.0, minimum-scale=1.0">

    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="css/estilos-formularios.css">
    <link rel="stylesheet" href="css/crear-anuncio.css?v2">
    <link href="https://file.myfontastic.com/M5cEzXkWWw5QGJmPEw8uAA/icons.css" rel="stylesheet">
    <script src="js/jquery-3.6.0.min.js"></script>
    <script src="js/validacionForm.js"></script>
</head>

<body>
    <?php
    include 'php/conexion_be.php';
    session_start();

    if (isset($_SESSION['perfil'])) {
    } else {
        header("location: cuenta.php");
    }
    $id = $_SESSION['perfil'];

    //selecciona la imagen de la base de datos
    $consulta = "SELECT imagen FROM perfil WHERE correo_electronico = '$id'";

    //crea un array si encuentra la imagen con el correo
    $resultado = mysqli_query($conexion, $consulta);

    while ($fila = mysqli_fetch_array($resultado)) {

        $ruta_img = $fila["imagen"];
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

        <section class="crear-anuncio main__about__description">

            <div class="container flex-anuncio">
                <div class="titulo-pagina-anuncio">
                    <h1>Crea tu anuncio</h1>
                </div>

                <form name="form" id="form" method="POST" action="php/crear_anuncio.php" enctype='multipart/form-data'>

                    <fieldset id="formulario-contenedor">
                        <legend>Detalles del anuncio</legend>

                        <div class="anuncio-titulo">
                            <label class="label" for="titulo-anuncio"><span>Titulo</span></label>
                            <div class="control">
                                <input class="input-text" type="text" name="titulo-anuncio" id="titulo-anuncio" onblur="validaControl('titulo-anuncio','errorTitulo-anuncio');" value="" title="Titulo" data-validate="{required:true}" aria-required="true">
                                <span id="errorTitulo"></span>
                            </div>
                        </div>

                        <div class="anuncio-tipo">
                            <label class="label" for="tipo-anuncio"><span>Tipo de producto</span></label>
                            <div class="control">
                                <select id="tipo-anuncio" name="tipo-anuncio" title="Tipo de producto" class="" defaultvalue="001" style="display: inline-block;">
                                    <option value="sin Categoria" selected="selected">Por favor seleccione una opción.</option>
                                    <option value="Usado">Segunda mano</option>
                                    <option value="Reacondicionado">Reacondicionado</option>
                                    <option value="Para Reparacion">Para reparacion</option>
                                    <option value="Para Repuesto">Para repuesto</option>
                                </select>
                            </div>
                        </div>

                        <div class="anuncio-categoria">
                            <label class="label" for="categoria-anuncio">
                                <span>Categoria</span>
                            </label>
                            <div class="control">
                                <select class="categoria-select" id="categoria-anuncio" name="categoria-anuncio" title="Categoria" defaultvalue="001" style="display: inline-block;">
                                    <option value="sinCategoria" selected="selected">Por favor seleccione una categoria.</option>
                                    <option value="agricultura">agricultura</option>
                                    <option value="arte">Arte</option>
                                    <option value="artesania">Artesanía</option>
                                    <option value="bebes">Bebés</option>
                                    <option value="camaras">Cámaras y Foto</option>
                                    <option value="computadoras">Computadoras / Tabletas y redes</option>
                                    <option value="electronica">Electrónica de consumo</option>
                                    <option value="libros">Libros y revistas</option>
                                    <option value="juguetes">Muñecas y osos</option>
                                    <option value="musica">Música</option>
                                    <option value="ropa">Ropa, zapatos y accesorios</option>
                                    <option value="telefonia">Teléfonos móviles y accesorios</option>
                                    <option value="juegos">Videojuegos y consolas</option>
                                </select>
                            </div>
                        </div>

                        <div class="region-dir">
                            <label class="label" for="ubicacion">
                                <span>Ubicacion de venta</span>
                            </label>
                            <div class="control">
                                <select id="" name="ubicacion" title="ubicacion" class="ubicacion-select" defaultvalue="001" style="display: inline-block;">
                                    <option value="sinRegion" selected="selected">Por favor seleccione región, estado o provincia.</option>
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



                        <div class="anuncio-condicion">
                            <label class="label" for="condicion-anuncio"><span>Descripcion de la condicion</span></label>
                            <div>
                                <textarea class="text-area" id="condicion-anuncio" fnk="cdsc" maxlength="255" name="condicion-anuncio" aria-describedby="condDescCount" style="background-color: rgb(255, 255, 255);"></textarea>
                            </div>
                        </div>


                        <label class="label" for="imagen-anuncio"><span>Sube una imagen del producto</span></label>

                        <div class="flex-anuncio">

                            <div class="columna1 column column--50">
                                <form id="uploadForm" action="upload.php" method="post" class="control">
                                    <input class="input-file" type="file" name="imagen" id="imagen">

                                    <h3 id="nombreTipoArchivo" onblur="mostrarTipoArchivo('imagen');">Tipo archivo img</h3><br>
                                    <!-- el h3 es para mostrar el nombre del archivo subido - aun esta sin completar -->
                                    <span id="errorImagen"></span>
                                </form>

                                <div id="imagePreview" class="foto-anuncio" >

                                </div>
                            </div>

                            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
                            <script type="text/javascript">
                                (function(){
                                    function filePreview(input){
                                        if(input.files && input.files[0]){
                                            var reader = new FileReader();

                                            reader.onload = function(e) {
                                                $('#imagePreview').html("<img src='" + e.target.result + "' />");
                                            }
                                            reader.readAsDataURL(input.files[0]);
                                        }
                                    }
                                    $('#imagen').change(function() {
                                        filePreview(this);
                                    });
                                })();
                            </script>


                        </div>





                        <div class="anuncio-desc_tecnica">
                            <label class="label" for="tecnica-anuncio"><span>Descripcion tecnica del producto</span></label>
                            <div>
                                <textarea class="text-area XL" id="tecnica-anuncio" fnk="cdsc" maxlength="255" name="tecnica-anuncio" aria-describedby="condDescCount" style="background-color: rgb(255, 255, 255);"></textarea>
                            </div>
                        </div>

                        <div class="anuncio-precio">
                            <label class="label" for="precio-anuncio"><span>Precio</span></label>
                            <div class="control">
                                <span>$</span>
                                <input class="input-text" type="number" name="precio-anuncio" id="precio-anuncio" md="dt|DOUBLE||vm|Please enter a valid Buy It Now price.||gdn|priceQtyPrntCell" vld="1" maxlength="10">
                            </div>
                        </div>

                        <div class="botonesAccion">
                            <div class="btn-izquierda">
                                <button type="submit" class="btn-enviar" id="btnEnviar" title="Guardar">
                                    <span>Guardar</span>
                                </button>
                            </div>
                        </div>

                    </fieldset>
                </form>
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