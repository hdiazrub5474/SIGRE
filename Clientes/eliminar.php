<?php

$NitCli=$_REQUEST['del_NitCli'];

include('configuracion.php');
                
$eliminar="DELETE FROM clientes WHERE NitCli='$NitCli'";
                
$resultado=mysqli_query($conexion, $eliminar);

if (!$resultado) {

    echo '<script>
            alert("Error al eliminar cliente");
            window.history.go(-1);
         </script>';
}else{
    
    echo '<script>
            alert("Cliente eliminado exitosamente");
            window.history.go(-3);
         </script>';
     //header("location:ConsultarUsuarios.php"); 
}
//cerrar conexion
mysqli_close($conexion);



?>