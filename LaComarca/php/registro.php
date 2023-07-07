<?php 

    include 'conexion_be.php';

    $nombre = $_POST['nombreR'];
    $apellido = $_POST['apellidoR'];
    $correo = $_POST['correoR'];
    $contrasena = $_POST['contrasenaR'] ;

    $contrasena = hash('sha512', $contrasena);
    
    $img_default = "usuario-perfil";
    //registra los datos en la base de datos
    $query = "INSERT INTO perfil(nombre, apellido, correo_electronico, pass_user,imagen)
              VALUES('$nombre','$apellido','$correo','$contrasena','$img_default')";

    //verifica que el campo no se repita
    $verificar_correo = mysqli_query($conexion, "SELECT * FROM perfil WHERE correo_electronico='$correo'");

    if(mysqli_num_rows($verificar_correo ) > 0){
        echo '
            <script>
                alert("El correo ya se ha registrado, intente con otro");
                window.location = "../cuenta.php";
            </script>
            ';
        exit();
    }

    $ejecutar = mysqli_query($conexion, $query);
    
    if($ejecutar){
        echo '
            <script>
            alert("Se ha registrado correctamente");
            window.location = "../cuenta.php";
            </script>
        ';
    }else{
        echo '
        <script>
            alert("ha ocurrido un error");
            window.location = "../cuenta.php";
        </script>
        ';
    }

    mysqli_close($conexion);
?>