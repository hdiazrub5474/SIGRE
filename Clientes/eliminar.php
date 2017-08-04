<?php

$numeroIdent=$_REQUEST['del_numeroIdent'];

include('configuracion.php');
                
//$consulta="SELECT * FROM usuario";
$eliminar="DELETE FROM proveedor WHERE numeroIdent='$numeroIdent'";
                
//echo "$eliminar"; 
  
$resultado=mysqli_query($conexion, $eliminar);
if (!$resultado) {
    //echo 'Error al registrarse';
    echo '<script>
            alert("Error al registrarse");
            window.history.go(-1);
         </script>';
}else{
    //echo 'usuario registrado exitosamente';
    
    echo '<script>
            alert("Proveedor eliminado exitosamente");
            window.history.go(-3);
         </script>';
     //header("location:ConsultarUsuarios.php"); 
}
//cerrar conexion
mysqli_close($conexion);



?>