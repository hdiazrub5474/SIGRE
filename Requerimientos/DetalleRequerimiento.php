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
    <form action="" method="post" class="form-register">
        <h2 class="form__titulo">DETALLE DE REQUERIMIENTO</h2>
        <div class="contenedor-inputs">
           
            <?php
            
            $idReq=$_REQUEST['idReq'];
            
            //Se invoca conexion a base de datos
            include('conusu.php');
            
            //Se realiza consulta a la tabla de solicitudes
            //$consulta="SELECT * FROM solicitud WHERE idReq='$idReq'";
            
            $consulta = "SELECT * FROM solicitud JOIN anexos ON solicitud.CodInt = anexos.CodInt where idReq=$idReq and TipArc = 'SOLICITUD'";
            
            /*$consulta="SELECT * FROM usuarios JOIN perfiles JOIN clientes ON usuarios.PERFILES_idPerfil = perfiles.idPerfil and usuarios.NitCli = clientes.NitCli WHERE NitUsu='$NitUsu'" ;*/
            
            //Se ejecuta consulta
            $resultado=mysqli_query($conexion, $consulta);
            $registro = mysqli_fetch_array($resultado);
            
                
                        
            ?>
            
            <input id="VarReq" type="hidden" name="idReq" value="<?php echo $registro['idReq'] ?>">
            <input type="text" name="CodInt" value="<?php echo $registro['CodInt'] ?>" placeholder="" class="input-100" required>
            <input type="text" name="NomReq" value="<?php echo $registro['NomReq'] ?>" placeholder="" class="input-100" required>
            <textarea class="input-textarea"><?php echo $registro['DesReq'] ?></textarea>
            <input type="text" name="TipSol" value="<?php echo $registro['TipSol'] ?>" placeholder="" class="input-48" required>
            <input type="text" name="FecSol" value="<?php echo $registro['FecSol'] ?>" placeholder="" class="input-48" required>
                                                               
            <a class="input-100"
                        href='Archivos/<?php echo $registro['NomRut'] ?>' target="_blank"><?php echo $registro['NomRut'] ?>
            </a> 
            
            
            
        </div>
    </form>
</body>
</html>