<?php

session_start();
$userlogin = $_SESSION['usuario_logueado'];

include 'conusu.php';
//recibir los datos y almacenarlos en variables
$idReq = $_POST["idReq"];
$CodInt = $_POST["CodInt"];
$CodUsu = $_POST["CodUsu"];
$Estado = $_POST["Estado"];
$NuevoEstado = "Desarrollo";
$time = time();
$time = date("Ymd");
//Variables para anexar archivo
$TipArc = "RECHAZO";
$archivo = $_FILES["Anexo"]["tmp_name"];
$destino = "Archivos/".$_FILES["Anexo"]["name"];
$nombre = $_FILES["Anexo"]["name"];


if ($Estado !== "Calidad"){
    if ($Estado == "Cerrado"){
        echo '<script>
            alert("Requerimiento ya esta en Cerrado");
            window.history.go(-2);
          </script>';
        exit;
    }
    if ($Estado == "Entregado"){
        echo '<script>
            alert("Requerimiento ya esta en Entregado");
            window.history.go(-2);
          </script>';
        exit;
    }
    if ($Estado == "Anulado"){
        echo '<script>
            alert("Requerimiento ya esta Anulado");
            window.history.go(-2);
          </script>';
        exit;
    }
}


//insertar tabla de anexos
$insertarAnexo = "INSERT INTO anexos(CodInt, TipArc, NomRut, UsuCre, FecCre) VALUES ('$CodInt', '$TipArc', '$nombre', '$userlogin', '$time')";

//consulta para actualizar
$actualizar = "UPDATE solicitud SET Estado='$NuevoEstado', FecEnt = '$time' WHERE idReq ='$idReq'";



//ejecutar consulta
$resultadoAnexo = mysqli_query($conexion, $insertarAnexo);
$resultado = mysqli_query($conexion, $actualizar);

if (!$resultado) {
    //echo 'Error al registrarse';
    echo '<script>
            alert("Error al Rechazar al Desarrollador");
            window.history.go(-1);
         </script>';
}else{
    copy($archivo, $destino);
    echo '<script>
            alert("Requerimiento Rechazado al Desarrollador");
            window.history.go(-3);
         </script>';
}

//cerrar conexion
mysqli_close($conexion);


?>