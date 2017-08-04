<?php

include 'configuracion.php';
//recibir los datos y almacenarlos en variables
$nombre = $_POST["nombre"];
$tipoIdent = $_POST["tipoIdent"];
$numeroIdent = $_POST["numeroIdent"];
$telefono = $_POST["telefono"];
$direccion = $_POST["direccion"];
//consulta para insertar
$actualizar = "UPDATE proveedor SET nombre='$nombre', tipoIdent='$tipoIdent', telefono='$telefono', direccion='$direccion' WHERE numeroIdent ='$numeroIdent'";

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
            alert("Proveedor actualizado exitosamente");
            window.history.go(-3);
         </script>';
}

//cerrar conexion
mysqli_close($conexion);


?>