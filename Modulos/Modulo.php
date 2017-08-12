<?php

session_start();
$userlogin = $_SESSION['usuario_logueado'];

include 'configuracion.php';
//recibir los datos y almacenarlos en variables
$NomMod = $_POST["NomMod"];
$time   = date("Ymd");
//$time = date("Ymdhis");

//consulta para insertar
$insertar = "INSERT INTO modulos(NomMod, UsuCre, FecCre) VALUES ('$NomMod', '$userlogin', '$time')";
//verificar si ya existe el usuario en la base de datos
$consultar="SELECT * FROM modulos WHERE NomMod ='$NomMod'";
$verificar_modulo = mysqli_query($conexion, $consultar);
if (mysqli_num_rows($verificar_modulo) > 0){
    
    echo '<script>
            alert("El modulo ya esta registrado");
            window.history.go(-1);
          </script>';
    exit;
}
//ejecutar consulta
$resultado = mysqli_query($conexion, $insertar);
if (!$resultado) {
    
    echo '<script>
            alert("Error al registrar Modulo");
            window.history.go(-1);
         </script>';
}else{
    
    echo '<script>
            alert("Modulo registrado exitosamente");
            window.history.go(-2);
         </script>';
}
//cerrar conexion
mysqli_close($conexion);

?>