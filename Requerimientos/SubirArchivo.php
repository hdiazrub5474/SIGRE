<?php

    include 'conexion.php';

    
    $archivo = $_FILES["archivo_fls"]["tmp_name"];
    $destino = "Archivos/".$_FILES["archivo_fls"]["name"];
    $nombre = $_FILES["archivo_fls"]["name"];

    //move_uploaded_file($archivo,$destino);
    copy($archivo,$destino);
    echo "Archivo cargado";

    $insertar ="INSERT INTO rutas(NomRut)VALUES ('$nombre')";
    
    $resultado = mysqli_query($conexion,$insertar);

    if(!$resultado){
    //echo 'Error al registrarse';
    echo '<script>
            alert("Error al registrar Ruta");
         </script>';
    }else{
    //echo 'usuario registrado exitosamente';
    echo '<script>
            alert("Ruta registrado exitosamente");
         </script>';
    }
    //cerrar conexion
    mysqli_close($conexion);



?>