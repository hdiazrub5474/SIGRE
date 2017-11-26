<?php

session_start();
$userlogin = $_SESSION['usuario_logueado'];

include 'conusu.php';
//recibir los datos y almacenarlos en variables
$idReq = $_POST["idReq"];
$CodUsu  = $_POST["CodUsu"];
$CodInt = $_POST["CodInt"];
$FecCal = $_POST["FecCal"];
$Estado = $_POST["Estado"];
$NuevoEstado = "Desarrollo";
$time = time();
$time = date("Ymd");
//Variables para envio de correos
$Email = "hd.solutions.sas@gmail.com";
$CodInt = $_POST["CodInt"];
$NomReq = $_POST["NomReq"];
$NomUsu = "";

if ($Estado !== "Pendiente Asignacion"){
    
        echo '<script>
            alert("Requerimiento no puede ser Asignado, estado no aplica");
            window.history.go(-2);
          </script>';
        exit;
    
}


//consultar correo del usuario
$consultar = "SELECT Email, NomUsu FROM usuarios WHERE CodUsu = '$CodUsu'";
$resultadoconsulta = mysqli_query($conexion, $consultar);

while ($registro = mysqli_fetch_array($resultadoconsulta)){
    $Email = $registro['Email'];
    $NomUsu = $registro['NomUsu'];
}




//insertar tabla de solicitudes
$actualizar = "UPDATE solicitud SET UsuAsig='$CodUsu', FecDes='$time', FecCal='$FecCal', Estado='$NuevoEstado' WHERE idReq ='$idReq'";

$actualizarCalidad = "UPDATE calidad SET FecCal='$FecCal' WHERE CodInt ='$CodInt'";
$resultadoCalidad = mysqli_query($conexion, $actualizarCalidad);
    

    $resultado = mysqli_query($conexion, $actualizar);
    if (!$resultado){
        echo '<script>
                alert("Error al registrar solicitud");
                window.history.go(-2);
              </script>';
    }else{
        
        //envio de correo al usuario confirmando la asignacion del requerimiento
        $destino = "$Email";
        $contacto = "Asignación Requerimiento: " .$CodInt;
        //$contenido = "Nombre: " . $NomUsu . "\nCorreo: " . $Email . "\nRequerimiento: " . $CodInt . "\nMensaje: " . $mensaje;
        $contenido = "Ingeniero: " . $NomUsu . " se le asignó el requerimiento " . $CodInt . "\nPor favor su gestión ";
        mail($destino, $contacto, $contenido);
        //header("Location:gracias.html");
        
        
        
        
        echo '<script>
                alert("Solicitud registrada exitosamente");
                window.history.go(-2);
              </script>'; 
    }

    

//cerrar conexion
mysqli_close($conexion);



?>