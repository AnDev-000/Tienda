<?php 

    session_start();

    include 'conexion_be.php';


    $correo = $_POST['correoL'];
    $contrasena = $_POST['contrasenaL'];

    $contrasena = hash('sha512', $contrasena);




    $consulta = "SELECT * FROM perfil WHERE correo_electronico = '$correo'";


    //crea un array si encuentra la imagen con el correo
    $resultado = mysqli_query($conexion, $consulta);
    
    while ($fila = mysqli_fetch_array($resultado)) {
    
        $tipoUsuario = $fila["tipo_usuario"];
    }



    $validar_login = mysqli_query($conexion, "SELECT * FROM perfil WHERE correo_electronico='$correo'
                                                AND pass_user = '$contrasena'");
    if($tipoUsuario==1){
        if(mysqli_num_rows($validar_login) > 0){

            $_SESSION['perfil'] = $correo;
            header("location: ../index.php");
            exit;
        }else{
            echo '
                <script>
                    alert("Usuario no existe, por favor verifique los datos introducidos");
                    window.location = "../cuenta.php";
                </script>
            ';
            exit;
        }
        mysqli_close($conexion);
    }if($tipoUsuario==2){
        if(mysqli_num_rows($validar_login) > 0){

            $_SESSION['perfil'] = $correo;
            header("location: ../administrador.php");
            exit;
        }else{
            echo '
                <script>
                    alert("Usuario no existe, por favor verifique los datos introducidos");
                    window.location = "../cuenta.php";
                </script>
            ';
            exit;
        }
    }
    





    
?>