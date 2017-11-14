<?php

include 'conusu.php';
//recibir los datos y almacenarlos en variables
$idReq = $_POST["idReq"];
$Estado = $_POST["Estado"];
//consulta para actualizar
$actualizar = "UPDATE solicitud SET Estado='$Estado' WHERE idReq ='$idReq'";

//echo "$actualizar"

//ejecutar consulta
$resultado = mysqli_query($conexion, $actualizar);
if (!$resultado) {
    //echo 'Error al registrarse';
    echo '<script>
            alert("Error al anular");
            window.history.go(-1);
         </script>';
}else{
    //echo 'usuario registrado exitosamente';
    echo '<script>
            alert("Usuario anular exitosamente");
            window.history.go(-3);
         </script>';
}

//cerrar conexion
mysqli_close($conexion);


?>