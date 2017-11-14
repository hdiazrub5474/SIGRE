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
$archivo = $_FILES["Anexo"]["tmp_name"];
$destino = "Archivos/".$_FILES["Anexo"]["name"];
$nombre = $_FILES["Anexo"]["name"];


//validar cliente relacionado al usuario
$consulta = "SELECT * FROM usuarios WHERE CodUsu='$userlogin'";
$resultado = mysqli_query($conexion, $consulta);

//echo $consulta;

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
        echo '<script>
                alert("Solicitud registrada exitosamente");
                window.history.go(-2);
              </script>';
    }
}
    

//cerrar conexion
mysqli_close($conexion);

?>