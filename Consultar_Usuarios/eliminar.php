<?php

session_start();
$userlogin = $_SESSION['usuario_logueado'];


$CodUsu=$_REQUEST['del_CodUsu'];


//validar campos vacios
if ($userlogin==$CodUsu){
    echo '<script>
            alert("No se puede eliminar el usuario logueado");
            window.history.go(-3);
          </script>';
    exit;
}


include('conusu.php');
                

$eliminar="DELETE FROM usuarios WHERE CodUsu='$CodUsu'";
                
$resultado=mysqli_query($conexion, $eliminar);
if (!$resultado) {
    
    echo '<script>
            alert("Error al registrarse");
            window.history.go(-1);
         </script>';
}else{
        
    echo '<script>
            alert("Usuario eliminado exitosamente");
            window.history.go(-3);
         </script>';
     //header("location:ConsultarUsuarios.php"); 
}
//cerrar conexion
mysqli_close($conexion);

?>