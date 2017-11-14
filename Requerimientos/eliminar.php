<?php

session_start();
$userlogin = $_SESSION['sesion_exito'];


$idReq=$_REQUEST['del_idReq'];


include('conusu.php');
                
//$consulta="SELECT * FROM usuario";
$eliminar="DELETE FROM solicitud WHERE idReq='$idReq'";
                
$resultado=mysqli_query($conexion, $eliminar);
if (!$resultado) {
    //echo 'Error al registrarse';
    echo '<script>
            alert("Error al eliminar registro");
            window.history.go(-1);
         </script>';
}else{
    //echo 'usuario registrado exitosamente';
    
    echo '<script>
            alert("Registro eliminado exitosamente");
            window.history.go(-3);
         </script>';
     //header("location:ConsultarUsuarios.php"); 
}
//cerrar conexion
mysqli_close($conexion);

?>