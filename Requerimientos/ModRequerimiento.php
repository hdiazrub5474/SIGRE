<?php

include 'conusu.php';
//recibir los datos y almacenarlos en variables
$idUsuario = $_POST["idUsuario"];
$nombres = $_POST["nombres"];
$apellidos = $_POST["apellidos"];
$email = $_POST["email"];
$username = $_POST["username"];
$contrasena = $_POST["contrasena"];
$Rol_idRol = $_POST["Rol_idRol"];
//consulta para insertar
$actualizar = "UPDATE usuario SET nombres='$nombres', apellidos='$apellidos', email='$email', username='$username', contrasena='$contrasena', Rol_idRol='$Rol_idRol' WHERE idUsuario ='$idUsuario'";

//echo "$actualizar"

//ejecutar consulta
$resultado = mysqli_query($conexion, $actualizar);
if (!$resultado) {
    //echo 'Error al registrarse';
    echo '<script>
            alert("Error al actualizar");
            window.history.go(-1);
         </script>';
}else{
    //echo 'usuario registrado exitosamente';
    echo '<script>
            alert("Usuario actualizado exitosamente");
            window.history.go(-3);
         </script>';
}

//cerrar conexion
mysqli_close($conexion);


?>