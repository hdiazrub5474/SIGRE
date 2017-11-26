<?php

include 'conusu.php';
//recibir los datos y almacenarlos en variables
$idReq = $_POST["idReq"];
$Estado = "Cerrado";
//consulta para actualizar
$actualizar = "UPDATE solicitud SET Estado='$Estado' WHERE idReq ='$idReq'";

//echo "$actualizar"

//ejecutar consulta
$resultado = mysqli_query($conexion, $actualizar);
if (!$resultado) {
    //echo 'Error al registrarse';
    echo '<script>
            alert("Error al cerrar requerimiento");
            window.history.go(-1);
         </script>';
}else{
    //echo 'usuario registrado exitosamente';
    echo '<script>
            alert("Requerimiento cerrado exitosamente");
            window.history.go(-3);
         </script>';
}

//cerrar conexion
mysqli_close($conexion);


?>