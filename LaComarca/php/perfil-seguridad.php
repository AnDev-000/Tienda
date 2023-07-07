<?php 
    //codigo de inicio de sesion y toma de datos
    include 'conexion_be.php';
    session_start();

    if(isset($_SESSION['perfil'])){
        
    }else {
        header("location: cuenta.php");
    }
    
    $id = $_SESSION['perfil'];

    $pass = $_POST['password'];
    $pass = hash('sha512', $pass);
    $nPass = $_POST['Npassword'];
    $nPass = hash('sha512', $nPass);
    $nPass2 = $_POST['Npassword2'];
    
    $consulta = "SELECT idperfil_user FROM perfil WHERE correo_electronico = '$id'";

    //crea un array si encuentra la imagen con el correo
    $resultado = mysqli_query($conexion, $consulta);

    while($fila=mysqli_fetch_array($resultado)){   

        $id_user = $fila["idperfil_user"];
    }

    $consulta = "SELECT pass_user FROM perfil WHERE correo_electronico = '$id'";

    //crea un array si encuentra la imagen con el correo
    $resultado = mysqli_query($conexion, $consulta);

    while($fila=mysqli_fetch_array($resultado)){   

        $actualPass = $fila["pass_user"];
    }
    

    //Cambio de datos sin contraseña
    $validar_usuario= mysqli_query($conexion, "SELECT * FROM perfil  WHERE correo_electronico ='$id'" );
    if($actualPass==$pass){
        $actualizar =  mysqli_query($conexion,"UPDATE perfil SET pass_user='$nPass' WHERE idperfil_user = '$id_user'");

                    if($actualizar){
                    echo "<script>alert
                            ('Contraseña actualizada correctamente');
                            
                        </script>";
        
                    }else{
                        echo "<script>alert
                                   ('Por favor, verifique los datos ingresados');
                             </script>";
                    }
    }else{
        echo "<script>
                alert ('$actualPass');
            </script>";

    }
    
?>