<?php

session_start();
$userlogin = $_SESSION['usuario_logueado'];

include 'conusu.php';
//recibir los datos y almacenarlos en variables
$idReq = $_POST["idReq"];
$CodUsu = $_POST["CodUsu"];
$CodInt = $_POST["CodInt"];
$Estado = $_POST["Estado"];
$NuevoEstado = "Calidad";
$time = time();
$time = date("Ymd");
$TipArc = "DESARROLLO";
//Variables para anexar archivo
$archivo = $_FILES["Anexo"]["tmp_name"];
$destino = "Archivos/".$_FILES["Anexo"]["name"];
$nombre = $_FILES["Anexo"]["name"];
//Variables para envio de correos
$Email = "hd.solutions.sas@gmail.com";
$NomUsu = "";



if ($Estado !== "Desarrollo"){
    if ($Estado == "Calidad"){
        echo '<script>
            alert("Requerimiento ya esta en Calidad");
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

//consultar correo del usuario
$consultar = "SELECT Email, NomUsu FROM usuarios WHERE CodUsu = '$CodUsu'";
$resultadoconsulta = mysqli_query($conexion, $consultar);

while ($registro = mysqli_fetch_array($resultadoconsulta)){
    $Email = $registro['Email'];
    $NomUsu = $registro['NomUsu'];
}

//insertar tabla de anexos
$insertarAnexo = "INSERT INTO anexos(CodInt, TipArc, NomRut, UsuCre, FecCre) VALUES ('$CodInt', '$TipArc', '$nombre', '$userlogin', '$time')";

//consulta para actualizar
$actualizar = "UPDATE solicitud SET Estado='$NuevoEstado', FecCal = '$time' WHERE idReq ='$idReq'";
$actualizarCalidad = "UPDATE calidad SET UsuCal='$CodUsu', FecCal = '$time' WHERE CodInt ='$CodInt'";


//ejecutar consulta
$resultadoAnexo = mysqli_query($conexion, $insertarAnexo);
$resultado = mysqli_query($conexion, $actualizar);
$resultadoCalidad = mysqli_query($conexion, $actualizarCalidad);
if (!$resultado) {
    //echo 'Error al registrarse';
    echo '<script>
            alert("Error al entregar a Calidad");
            window.history.go(-1);
         </script>';
}else{
    copy($archivo, $destino);
    
    //envio de correo al usuario confirmando la asignacion del requerimiento
    $destino = "$Email";
    $contacto = "Asignación Requerimiento para Pruebas: " .$CodInt;
    $contenido = "Ingeniero: " . $NomUsu . " se le asignó el requerimiento " . $CodInt . "\nPor favor su gestión ";
    mail($destino, $contacto, $contenido);
        
    echo '<script>
            alert("Requerimiento entregado a Calidad");
            window.history.go(-3);
         </script>';
}

//cerrar conexion
mysqli_close($conexion);


?>