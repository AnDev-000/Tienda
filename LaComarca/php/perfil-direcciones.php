<?php 
    //codigo de inicio de sesion y toma de datos
    include 'conexion_be.php';
    session_start();

    if(isset($_SESSION['perfil'])){
        
        $id = $_SESSION['perfil'];
    }else {
        header("location: cuenta.php");
    }
    
    $consulta = "SELECT idperfil_user FROM perfil WHERE correo_electronico = '$id'";

    //crea un array si encuentra la imagen con el correo
    $resultado = mysqli_query($conexion, $consulta);

    while($fila=mysqli_fetch_array($resultado)){   

        $id_user = $fila["idperfil_user"];
    }

    $nombres = $_POST['nombre'];
    $calle = $_POST['direccion'];
    $numero = $_POST['numero']; 
    $region = $_POST['region'];
    $comuna = $_POST['comuna'];
    $codPost = $_POST['cPostal'];


    //registra los datos en la base de datos
    $query = "INSERT INTO direcciones(nombre, direccion, numero, region, comuna, codigoPostal, idperfil_user)
    VALUES('$nombres','$calle','$numero','$region','$comuna','$codPost','$id_user')";


    $ejecutar = mysqli_query($conexion, $query);
    try{
        if($ejecutar){
            echo '
                <script>
                alert("Se ha registrado correctamente la direccion");
                window.location = "../perfil-direcciones.php";
                </script>
            ';
        }else{
            echo '
            <script>
                alert("ha ocurrido un error");
                window.location = "../perfil-direcciones.php";
            </script>
            ';
        }
    }catch (Exception $ex){
        echo $e; 
        
    }
    
    //wwindow.location = "../perfil-direcciones.php";
?>