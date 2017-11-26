<?php

$time = time();

//echo $time;

session_start();
$userlogin = $_SESSION['usuario_logueado'];


include 'conusu.php';
//recibir los datos y almacenarlos en variables
$CodInt = $_POST["CodInt"];
$NomReq = $_POST["NomReq"];
$DesReq = $_POST["DesReq"];
$TipSol = $_POST["TipSol"];
$idMod  = $_POST["idMod"];
$Estado = "Pendiente Asignacion";
$time = date("Ymd");
$NitCli = '0';
$TipArc = 'SOLICITUD';
//Variables para anexar archivo
$archivo = $_FILES["Anexo"]["tmp_name"];
$destino = "Archivos/".$_FILES["Anexo"]["name"];
$nombre = $_FILES["Anexo"]["name"];
//Variables para envio de correos
$Email = "hd.solutions.sas@gmail.com";
$NomUsu = "";


//consultar correo del usuario administrador
$consultaAdm = "SELECT Email, NomUsu FROM usuarios WHERE PERFILES_idPerfil = 1";
$resultadoconsultaAdm = mysqli_query($conexion, $consultaAdm);

while ($registroAdm = mysqli_fetch_array($resultadoconsultaAdm)){
    $Email = $registroAdm['Email'];
    $NomUsu = $registroAdm['NomUsu'];
}


//validar cliente relacionado al usuario
$consulta = "SELECT * FROM usuarios WHERE CodUsu='$userlogin'";
$resultado = mysqli_query($conexion, $consulta);

$filas = mysqli_num_rows($resultado);
if ($filas > 0){
    while($registro=mysqli_fetch_array($resultado)){
        $NitCli = $registro['NitCli'];
    }
}

//validar si la solicitud ya fue ingresada
$consultar_solicitud = "SELECT * FROM solicitud WHERE CodInt ='$CodInt'";
$verificar_solicitud = mysqli_query($conexion, $consultar_solicitud);
if (mysqli_num_rows($verificar_solicitud) > 0){
    
    echo '<script>
            alert("Solicitud ya esta registrada");
            window.history.go(-1);
          </script>';
    exit;
}

//insertar tabla de anexos
$insertarAnexo = "INSERT INTO anexos(CodInt, TipArc, NomRut, UsuCre, FecCre) VALUES ('$CodInt', '$TipArc', '$nombre', '$userlogin', '$time')";

//insertar tabla de calidad
$insertarCalidad = "INSERT INTO calidad(CodInt, UsuCal, FecCal) VALUES ('$CodInt', '', '')";


//insertar tabla de solicitudes
$insertar = "INSERT INTO solicitud(CodInt, NomReq, DesReq, TipSol, Estado, FecSol, FecDes, FecCal, FecEnt, UsuAsig, UsuReg, MODULOS_idMod, CLIENTES_NitCli, CALIDAD_CodInt) VALUES ('$CodInt', '$NomReq', '$DesReq', '$TipSol', '$Estado', '$time', '', '', '', '', '$userlogin', '$idMod', '$NitCli', '$CodInt')";



$resultadoAnexo = mysqli_query($conexion, $insertarAnexo);
if (!$resultadoAnexo){
    echo '<script>
            alert("Error al registrar solicitud.");
            window.history.go(-1);
          </script>';
}else{
    copy($archivo, $destino);
    
    $resultadoCalidad = mysqli_query($conexion, $insertarCalidad);
    $resultado = mysqli_query($conexion, $insertar);
    if (!$resultado){
        echo '<script>
                alert("Error al registrar solicitud");
                window.history.go(-2);
              </script>';
    }else{
        
        //envio de correo al usuario confirmando la asignacion del requerimiento
        $destino = "$Email";
        $contacto = "Registro Requerimiento Nuevo: " .$CodInt;
        $contenido = "Señor: " . $NomUsu . " se realizo el registro del requerimiento " . $CodInt . "\nPor favor su gestión ";
        mail($destino, $contacto, $contenido);
        
        echo '<script>
                alert("Solicitud registrada exitosamente");
                window.history.go(-2);
              </script>';
    }
}
    

//cerrar conexion
mysqli_close($conexion);

?>