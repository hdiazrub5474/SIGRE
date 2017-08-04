<?php

include 'configuracion.php';
//recibir los datos y almacenarlos en variables
$contrasena0 = $_POST["contrasena0"];
$contrasena1 = $_POST["contrasena1"];
$contrasena2 = $_POST["contrasena2"];

//verificar usuario y contraseña
session_start();
$username = $_SESSION['usuario_logueado'];
//echo "$username";
//echo "$contrasena0";

if ($contrasena0 == $contrasena1){
    echo '<script>
            alert("cambio de clave debe ser diferente a la actual");
            window.history.go(-1);
         </script>';
    exit;
}


if ($contrasena1 <> $contrasena2){
    echo '<script>
            alert("confirmacion de clave incorrecta");
            window.history.go(-1);
         </script>';
    exit;
}

$consultar = "SELECT * FROM usuarios WHERE CodUsu ='$username' and Clave='$contrasena0'";

$verificar_usuario = mysqli_query($conexion, $consultar);

if (mysqli_num_rows($verificar_usuario) > 0){
    //actualizar contraseña
    $actualizar = "UPDATE usuarios SET Clave='$contrasena1' WHERE CodUsu ='$username' and Clave='$contrasena0'";
    $resultado = mysqli_query($conexion, $actualizar);
    if (!$resultado) {
    //echo 'Error al registrarse';
    echo '<script>
            alert("Error al realizar cambio");
            window.history.go(-1);
         </script>';
    exit;
    }else{
    //echo 'usuario registrado exitosamente';
    echo '<script>
            alert("cambio realizado exitosamente");
            window.history.go(-2);
         </script>';
    }

}else{
     echo '<script>
            alert("contraseña actual incorrecta");
            window.history.go(-1);
          </script>';
    exit;
}
    
//cerrar conexion
mysqli_close($conexion);     

?>