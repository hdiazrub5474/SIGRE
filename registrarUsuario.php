<?php

session_start();

$userlogin = $_SESSION['usuario_logueado'];
$time = time();

include 'configuracion.php';
//recibir los datos y almacenarlos en variables
$CodUsu = $_POST["CodUsu"];
$NitUsu = $_POST["NitUsu"];
$NomUsu = $_POST["NomUsu"];
$NroTel = $_POST["NroTel"];
$Email  = $_POST["Email"];
$Clave  = $_POST["Clave"];
$NitCli = $_POST["NitCli"];
$idPerfil = $_POST["idPerfil"];
$time = date("Ymd");
//$time = date("Ymdhis");

//insertar tabla usuarios
$insertar = "INSERT INTO usuarios(CodUsu, NitUsu, NomUsu, NroTel, Email, Clave, UsuCre, Feccre, NitCli, PERFILES_idPerfil) VALUES ('$CodUsu', '$NitUsu', '$NomUsu', '$NroTel', '$Email', '$Clave', '$userlogin', $time, $NitCli, '$idPerfil')";

//verificar si ya existe el usuario en la base de datos
$verificar_usuario = mysqli_query($conexion, "SELECT * FROM usuarios WHERE CodUsu ='$CodUsu'");
if (mysqli_num_rows($verificar_usuario) > 0){
    
    echo '<script>
            alert("El usuario ya esta registrado");
            window.history.go(-1);
          </script>';
    exit;
}
//ejecutar consulta
$resultado = mysqli_query($conexion, $insertar);

if (!$resultado) {
    
    echo '<script>
            alert("Error al registrarse");
            window.history.go(-1);
         </script>';
}else{
    
    echo '<script>
            alert("Usuario registrado exitosamente");
            window.history.go(-2);
         </script>';
}
//cerrar conexion
mysqli_close($conexion);

?>