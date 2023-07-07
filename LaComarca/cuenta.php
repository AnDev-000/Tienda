<?php 

    session_start();

    if(isset($_SESSION['perfil'])){
        header("location: index.php");
    }

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>La Comarca</title>
    <meta name="viewport" content="width=device-width, user-scalable=yes, initial-scale=1.0, maximum-scale=3.0, minimum-scale=1.0">
    
    <link rel="stylesheet" href="css/cuenta.css">
    <link rel="stylesheet" href="https://necolas.github.io/normalize.css/8.0.1/normalize.css">
    <link href="https://file.myfontastic.com/M5cEzXkWWw5QGJmPEw8uAA/icons.css" rel="stylesheet">

    <script src="js/jquery-3.6.0.min.js"></script>

</head>


<body>

    <header class="main-header">
        <div class="container container--flex">
            <!-- Logo -->
            <div class="logo-container column column--30">
                <a style="text-decoration: none;" href="index.php"><h1 class="logo">La Comarca</h1></a>
            </div>   
        </div>
    </header>
    <!-- banner imagen pagina completa -->
    <section class="banner">
        <img src="img/imagen3.jpg" alt="" class="banner__img">
    </section>

    <main class="container-main">
        <div class="contenedor__todo">
            <!-- Contenedor -->
            <div class="caja__trasera">
                <div class="caja__trasera-login">
                    <h3>¿Ya tienes una cuenta?</h3>
                    <p>Inicia sesión para entrar en la página</p>
                    <button id="btn__iniciar-sesion">Iniciar Sesión</button>
                </div>
                <div class="caja__trasera-register">
                    <h3>¿Aún no tienes una cuenta?</h3>
                    <p>Regístrate para que puedas iniciar sesión</p>
                    <button id="btn__registrarse">Regístrarse</button>
                </div>
            </div>

            <!--Formulario de Login y registro-->
            <div class="contenedor__login-register">
                <!--Login-->
                <form action="php/login.php" method="POST" class="formulario__login" id="formulario__login">
                    <h2>Iniciar Sesión</h2>


                    <div class="formulario__grupo" id="grupo__correoL">
                        <div class="formulario__grupo-input">
                        <input class="formulario__input" type="email" placeholder="Correo Electronico" name="correoL" required>
                            <i class="formulario__validacion-estado fas fa-times-circle"></i>
                        </div>
                        <p class="formulario__input-error">El correo electronico debe contener solo letras, numeros, puntos y guiones. (Ejemplo: Ejemplo123@gmail.com)</p>
                    </div>

                    <div class="formulario__grupo" id="grupo__contrasenaL">
                        <div class="formulario__grupo-input">
                        <input class="formulario__input" type="password" placeholder="Contraseña" name="contrasenaL" required>                           
                        <i class="formulario__validacion-estado fas fa-times-circle"></i>
                        </div>
                        <p class="formulario__input-error">La contraseña debe tener entre 6 y 12 digitos</p>
                    </div>

                    <button type="submit"  >Entrar</button>
                </form>

                <!--Register-->
                <form action="php/registro.php" method="POST" class="formulario__register" id="formulario__register" >
                    <h2>Regístrarse</h2>

                    <div class="formulario__grupo" id="grupo__nombreR">
                        <div class="formulario__grupo-input">
                            <input class="formulario__input" type="text" placeholder="Nombre" name="nombreR" id="nombreRegistro" required>
                            <i class="formulario__validacion-estado fas fa-times-circle"></i>
                        </div>
                        <p class="formulario__input-error">El nombre solo debe contener letras.</p>
                    </div>

                    <div class="formulario__grupo" id="grupo__apellidoR">
                        <div class="formulario__grupo-input">
                        <input class="formulario__input" type="text" placeholder="Apellido" name="apellidoR" id="apellidoRegistro"  required>
                            <i class="formulario__validacion-estado fas fa-times-circle"></i>
                        </div>
                        <p class="formulario__input-error">El apellido solo debe contener letras</p>
                    </div>

                    <div class="formulario__grupo" id="grupo__correoR">
                        <div class="formulario__grupo-input">
                            <input class="formulario__input" type="email" placeholder="Correo Electronico" name="correoR" id="correoRegistro"  required>   
                            <i class="formulario__validacion-estado fas fa-times-circle"></i>
                        </div>
                        <p class="formulario__input-error">El correo electronico debe contener solo letras, numeros, puntos y guiones. (Ejemplo: Ejemplo123@gmail.com)</p>
                    </div>

                    <div class="formulario__grupo" id="grupo__contrasenaR">
                        <div class="formulario__grupo-input">
                            <input class="formulario__input" type="password" placeholder="Contraseña" name="contrasenaR" id="contrasenaRegistro" required>
                            <i class="formulario__validacion-estado fas fa-times-circle"></i>
                        </div>
                        <p class="formulario__input-error">La contraseña debe tener entre 6 y 12 digitos</p>
                    </div>

                    <div class="formulario__mensaje" id="formulario__mensaje">
				        <p><i class="fas fa-exclamation-triangle"></i> <b>Error:</b> Rellene los campos correctamente. </p>
			        </div>
                    
                    <div class="formulario__grupo formulario__grupo-btn-enviar">   
                    <button class="formulario__btn" id='btn' disabled>Regístrarse</button>
                    </div>
                </form>
            </div>
        </div>
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
    <script src="js/menu.js"></script>
    <script src="js/cuenta.js"></script>
    <script src="js/validacionForm.js"></script>
    <script src="https://kit.fontawesome.com/2c36e9b7b1.js" crossorigin="anonymous"></script>
</body>
</html>