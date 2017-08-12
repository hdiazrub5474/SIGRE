<?php

session_start();
$userlogin = $_SESSION['usuario_logueado'];

include 'configuracion.php';
//recibir los datos y almacenarlos en variables
$NitCli = $_POST["NitCli"];
$NomCli = $_POST["NomCli"];
$NroTel = $_POST["NroTel"];
$Email  = $_POST["Email"];
$NomDir = $_POST["NomDir"];
$NomCiu = $_POST["NomCiu"];
$time   = date("Ymd");
//$time = date("Ymdhis");
//consulta para insertar
$actualizar = "UPDATE clientes SET NomCli='$NomCli', NroTel='$NroTel', Email='$Email', NomDir='$NomDir', NomCiu='$NomCiu', UsuCre='$userlogin', FecCre='$time' WHERE NitCli ='$NitCli'";

//ejecutar consulta
$resultado = mysqli_query($conexion, $actualizar);
if (!$resultado) {
    //echo 'Error al registrarse';
    echo '<script>
            alert("Error al actualizar Cliente");
            window.history.go(-1);
         </script>';
}else{
    echo '<script>
            alert("Cliente actualizado exitosamente");
            window.history.go(-3);
         </script>';
}

//cerrar conexion
mysqli_close($conexion);


?>