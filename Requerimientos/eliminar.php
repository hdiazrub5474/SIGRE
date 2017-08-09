<?php

session_start();
$userlogin = $_SESSION['sesion_exito'];


$username=$_REQUEST['del_username'];

//echo "$username";

//validar campos vacios
if ($userlogin==$username){
    echo '<script>
            alert("No se puede eliminar el usuario logeado");
            window.history.go(-3);
          </script>';
    exit;
}


include('conusu.php');
                
//$consulta="SELECT * FROM usuario";
$eliminar="DELETE FROM usuario WHERE username='$username'";
                
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
            alert("Usuario eliminado exitosamente");
            window.history.go(-3);
         </script>';
     //header("location:ConsultarUsuarios.php"); 
}
//cerrar conexion
mysqli_close($conexion);

?>