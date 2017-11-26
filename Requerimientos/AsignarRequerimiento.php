<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Formulario de Registro</title>
    <link rel="stylesheet" href="css/estilos_requerimientos.css">
        <script>
        function Deshabilitar(){
            var VarReq = document.getElementById("VarReq");
            VarReq.disabled = true;
                     
        }
    </script>
</head>
<body onload="Deshabilitar()">
   <h1><img src="img/logo_sigre_2.jpg" alt="" class="logo"></h1>
    <form action="AsignarSolicitud.php" method="post" class="form-register">
        <h2 class="form__titulo">ASIGNAR DE REQUERIMIENTO</h2>
        <div class="contenedor-inputs">
           
            <?php
            
            $idReq=$_REQUEST['idReq'];
            
            //Se invoca conexion a base de datos
            include('conusu.php');
            
            //Se realiza consulta a la tabla de solicitudes
            //$consulta="SELECT * FROM solicitud WHERE idReq='$idReq'";
            
            $consulta = "SELECT * FROM solicitud JOIN anexos ON solicitud.CodInt = anexos.CodInt where idReq=$idReq";
            
            /*$consulta="SELECT * FROM usuarios JOIN perfiles JOIN clientes ON usuarios.PERFILES_idPerfil = perfiles.idPerfil and usuarios.NitCli = clientes.NitCli WHERE NitUsu='$NitUsu'" ;*/
            
            //Se ejecuta consulta
            $resultado=mysqli_query($conexion, $consulta);
            $registro = mysqli_fetch_array($resultado);
            
                
                        
            ?>
            
            <input type="text" name="idReq" value="<?php echo $registro['idReq'] ?>" readonly>
            <input type="text" name="CodInt" value="<?php echo $registro['CodInt'] ?>" placeholder="" class="input-48"  readonly>
            <input type="text" name="NomReq" value="<?php echo $registro['NomReq'] ?>" placeholder="" class="input-100" readonly>
            <input type="text" name="Estado" value="<?php echo $registro['Estado'] ?>" placeholder="" class="input-100" readonly>
            
            <select name="CodUsu" class="input-48" required  >
                <option value="">Seleccionar Usuario</option>
            
            <?php
                
                //Se realiza consulta a la tabla
                $consulta="SELECT * FROM usuarios where PERFILES_idPerfil = 2";
                //Se ejecuta consulta
                $resultado=mysqli_query($conexion, $consulta);
                //Se realiza ciclo para leer tabla y llenar los option
                while ($registro = mysqli_fetch_array($resultado)){            
                    echo "
                            <option value=".$registro['CodUsu'].">"
                                           .$registro['NomUsu']."
                            </option>
                        ";
                }
            ?>
            
            
            <!--<input type="date" name="FecDes" value="" placeholder="Desarrollo" class="input-48" required>-->
            <input type="date" name="FecCal" value="" placeholder="Calidad" class="input-48" required>
                                                               
             
            
            <input type="submit" value="ASIGNAR" class="btn-enviar">
            
        </div>
    </form>
    <div>
        <a href="../menu.php">
            <img src="img/menu3.jpg" class="ImagenMenu">
        </a>
    </div>
</body>

</html>