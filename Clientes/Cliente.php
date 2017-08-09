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
$time   = date("Ymdhis");

//consulta para insertar
$insertar = "INSERT INTO clientes(NitCli, NomCli, NroTel, Email, NomDir, NomCiu, UsuCre, FecCre) VALUES ('$NitCli', '$NomCli', '$NroTel ', '$Email', '$NomDir', '$NomCiu', '$userlogin', '$time')";
//verificar si ya existe el usuario en la base de datos
$consultar="SELECT * FROM clientes WHERE NitCli ='$NitCli'";
$verificar_usuario = mysqli_query($conexion, $consultar);
if (mysqli_num_rows($verificar_usuario) > 0){
    //echo 'El usuario ya esta registrado';
    echo '<script>
            alert("El cliente ya esta registrado");
            window.history.go(-1);
          </script>';
    exit;
}
//ejecutar consulta
$resultado = mysqli_query($conexion, $insertar);
if (!$resultado) {
    //echo 'Error al registrarse';
    echo '<script>
            alert("Error al registrar Cliente");
            window.history.go(-1);
         </script>';
}else{
    //echo 'usuario registrado exitosamente';
    echo '<script>
            alert("Cliente registrado exitosamente");
            window.history.go(-2);
         </script>';
}
//cerrar conexion
mysqli_close($conexion);

?>