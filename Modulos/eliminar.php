<?php

$idMod=$_REQUEST['del_idMod'];

include('configuracion.php');
                
$eliminar="DELETE FROM modulos WHERE idMod='$idMod'";
                
$resultado=mysqli_query($conexion, $eliminar);

if (!$resultado) {

    echo '<script>
            alert("Error al eliminar modulo");
            window.history.go(-1);
         </script>';
}else{
    
    echo '<script>
            alert("Modulo eliminado exitosamente");
            window.history.go(-3);
         </script>';
     //header("location:ConsultarUsuarios.php"); 
}
//cerrar conexion
mysqli_close($conexion);



?>