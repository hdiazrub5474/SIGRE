<?php

//conectar a la base de datos
include 'configuracion.php';

//variable global
session_start();

$_SESSION['usuario_logueado']=0;
$_SESSION['nivel_usuario']=0;
$_SESSION['id_Usuario']=0;

$usuario = $_POST['usuario'];
$clave = $_POST['clave'];

//validar campos vacios
if ($usuario=="" || $clave==""){
    echo '<script>
            alert("los campos son obligatorios");
            header("location:index.html");
          </script>';
    exit;
}


$consulta="SELECT * FROM usuarios WHERE CodUsu='$usuario' and Clave='$clave'";
$resultado=mysqli_query($conexion, $consulta);


$filas=mysqli_num_rows($resultado);
if ($filas > 0){
    $_SESSION['usuario_logueado']=$usuario;
    
    while ($registro = mysqli_fetch_array($resultado)){
     
           $_SESSION['id_Usuario']=$registro['NitUsu'];
           $_SESSION['nivel_usuario']=$registro['PERFILES_idPerfil'];
        
         
    }
    //$nivel = $_SESSION['nivel_usuario'];
    //$nivel = $_SESSION['id_Usuario'];
    //echo $nivel;
    header("location:menu.php"); 
}
else{
    echo '<script>
            alert("Error en autenticación");
            window.history.go(-1);
         </script>';
}

mysqli_free_result($resultado);
mysqli_close($conexion);

?>