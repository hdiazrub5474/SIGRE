<?php

include 'configuracion.php';
//recibir los datos y almacenarlos en variables
$nombre = $_POST["nombre"];
$tipoIdent = $_POST["tipoIdent"];
$numeroIdent = $_POST["numeroIdent"];
$telefono = $_POST["telefono"];
$direccion = $_POST["direccion"];

//consulta para insertar
$insertar = "INSERT INTO proveedor(nombre, tipoIdent, numeroIdent, telefono, direccion) VALUES ('$nombre', '$tipoIdent', '$numeroIdent', '$telefono', '$direccion')";
//verificar si ya existe el usuario en la base de datos
$verificar_usuario = mysqli_query($conexion, "SELECT * FROM proveedor WHERE numeroIdent ='$numeroIdent'");
if (mysqli_num_rows($verificar_usuario) > 0){
    //echo 'El usuario ya esta registrado';
    echo '<script>
            alert("El proveedor ya esta registrado");
            window.history.go(-1);
          </script>';
    exit;
}
//ejecutar consulta
$resultado = mysqli_query($conexion, $insertar);
if (!$resultado) {
    //echo 'Error al registrarse';
    echo '<script>
            alert("Error al registrar Proveedor");
            window.history.go(-1);
         </script>';
}else{
    //echo 'usuario registrado exitosamente';
    echo '<script>
            alert("Proveedor registrado exitosamente");
            window.history.go(-2);
         </script>';
}
//cerrar conexion
mysqli_close($conexion);

?>