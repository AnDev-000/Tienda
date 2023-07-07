<?php 

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

    $titulo = $_POST['titulo-anuncio'];
    $tProducto = $_POST['tipo-anuncio'];
    $categoria = $_POST['categoria-anuncio'];
    $ubicacion = $_POST['ubicacion'];
    $descCondicion = nl2br($_POST['condicion-anuncio']);
    $descTecnica = nl2br($_POST['tecnica-anuncio']);
    $precio = $_POST['precio-anuncio'];


    $imagen = $_FILES['imagen']['name'];
    $tipo_imagen = $_FILES['imagen']['type'];
    $tamano_imagen = $_FILES['imagen']['size'];

    try{
        if ($tamano_imagen <= 1000000) {

            if ($tipo_imagen == "image/jpeg" || $tipo_imagen == "image/jpg" || $tipo_imagen == "image/png") {
    
                //Ruta de la carpeta destino para guardar las imagenes del perfil en el servidor
                $carpeta_destino = $_SERVER['DOCUMENT_ROOT'] . '/Comarca/LaComarca1/img publicacion/';
    
                //mueve el archivo temporal a la carpeta
                move_uploaded_file($_FILES['imagen']['tmp_name'], $carpeta_destino . $imagen);
    
    
                $query = "INSERT INTO publicacion(titulo, condicion, tipo_producto, categoria, ubicacion_venta, imagen, desc_tecnica, precio, idperfil_user)
                        VALUES('$titulo','$descCondicion','$tProducto','$categoria', '$ubicacion', '$imagen', '$descTecnica','$precio','$id_user')";

                $ejecutar = mysqli_query($conexion, $query);
                if ($ejecutar) {
                echo "<script>alert
                        ('Se ha publicado su producto');
                        window.location = '../crear-anuncio.php';
                    </script>";
                } else {
                echo "<script>alert
                        ('Por favor, verifique los datos ingresados');
                    </script>";
                }
            } else {
                echo "Solo se pueden subir imagenes jpg/jpeg/png";
            }
        } else {
    
            echo "El tamaño del archivo supera el limite";
        }
    }catch (Exception $ex){
        echo $e; 
        
    }    

        
?>