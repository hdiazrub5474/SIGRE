<?php

session_start();
$userlogin = $_SESSION['usuario_logueado'];

include 'configuracion.php';
//recibir los datos y almacenarlos en variables
$idMod  = $_POST["idMod"];
$NomMod = $_POST["NomMod"];
$time   = date("Ymd");
//$time = date("Ymdhis");
//consulta para insertar
$actualizar = "UPDATE modulos SET NomMod='$NomMod', UsuCre='$userlogin', FecCre='$time' WHERE idMod ='$idMod'";

//ejecutar consulta
$resultado = mysqli_query($conexion, $actualizar);
if (!$resultado) {
    //echo 'Error al registrarse';
    echo '<script>
            alert("Error al actualizar Modulo");
            window.history.go(-1);
         </script>';
}else{
    echo '<script>
            alert("Modulo actualizado exitosamente");
            window.history.go(-3);
         </script>';
}

//cerrar conexion
mysqli_close($conexion);


?>