<?php

$time = time();

session_start();
$userlogin = $_SESSION['usuario_logueado'];

include 'conusu.php';
//recibir los datos y almacenarlos en variables
$CodUsu = $_POST["CodUsu"];
$NitUsu = $_POST["NitUsu"];
$NomUsu = $_POST["NomUsu"];
$NroTel = $_POST["NroTel"];
$Email  = $_POST["Email"];
$Clave  = $_POST["Clave"];
$NitCli = $_POST["NitCli"];
$idPerfil = $_POST["Perfil"];
$time = date("Ymd");
//$time = date("Ymdhis");


//consulta para insertar
$actualizar = "UPDATE usuarios SET CodUsu='$CodUsu', NomUsu='$NomUsu', NroTel='$NroTel', Email='$Email', Clave='$Clave', UsuCre='$userlogin', FecCre='$time', NitCli='$NitCli', PERFILES_idPerfil='$idPerfil' WHERE NitUsu ='$NitUsu'";


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