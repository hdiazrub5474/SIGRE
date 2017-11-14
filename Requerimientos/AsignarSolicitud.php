<?php

$time = time();

//echo $time;

session_start();
$userlogin = $_SESSION['usuario_logueado'];


include 'conusu.php';
//recibir los datos y almacenarlos en variables
$idReq = $_POST["idReq"];
$CodUsu  = $_POST["CodUsu"];
$FecDes = $_POST["FecDes"];
$FecCal = $_POST["FecCal"];
$Estado = "Desarrollo";
$time = date("Ymd");
$Email = "hd.solutions.sas@gmail.com";
$CodInt = $_POST["CodInt"];
$NomReq = $_POST["NomReq"];
$NomUsu = "";

//consultar correo del usuario
$consultar = "SELECT Email, NomUsu FROM usuarios WHERE CodUsu = '$CodUsu'";
$resultadoconsulta = mysqli_query($conexion, $consultar);

while ($registro = mysqli_fetch_array($resultadoconsulta)){
    $Email = $registro['Email'];
    $NomUsu = $registro['NomUsu'];
}




//insertar tabla de solicitudes
$actualizar = "UPDATE solicitud SET UsuAsig='$CodUsu', FecDes='$FecDes', FecCal='$FecCal', Estado='$Estado' WHERE idReq ='$idReq'";


    

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