<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Formulario de Registro</title>
    <link rel="stylesheet" href="css/estilos_requerimientos.css">
</head>
<body>
   <h1><img src="img/logo_sigre_2.jpg" alt="" class="logo"></h1>
    <form action="EntregarSolicitud.php" method="post" class="form-register" enctype="multipart/form-data">
        <h2 class="form__titulo">ENTREGAR REQUERIMIENTO</h2>
        <div class="contenedor-inputs">
            
            <?php
            
            $idReq=$_REQUEST['idReq'];
            
            //Se invoca conexion a base de datos
            include('conusu.php');
            //Se realiza consulta a la tabla
            $consulta="SELECT * FROM solicitud JOIN clientes JOIN modulos ON solicitud.CLIENTES_Nitcli = clientes.Nitcli and solicitud.MODULOS_idMod = modulos.idMod where idReq='$idReq'";
            
            //Se ejecuta consulta
            $resultado=mysqli_query($conexion, $consulta);
            $registro = mysqli_fetch_array($resultado);
                                        
            ?>
                           
                       
            <input type="hidden" name="idReq" value="<?php echo $registro['idReq'] ?>">
            <input type="text" name="CodInt" value="<?php echo $registro['CodInt'] ?>" readonly>
            <input type="text" name="NomReq" value="<?php echo $registro['NomReq'] ?>" class="input-100" readonly>
            <input type="text" name="TipSol" value="<?php echo $registro['TipSol'] ?>" class="input-48"  readonly>
            <input type="text" name="NomMod" value="<?php echo $registro['NomMod'] ?>" class="input-48"  readonly>
            <input type="text" name="NomCli" value="<?php echo $registro['NomCli'] ?>" class="input-48" readonly>
            
            <?php
                if ($registro["Estado"] == "Desarrollo"){
                echo "<select name='CodUsu' class='input-48' required>";
                   echo "<option value=''>Usuario Calidad</option>";
            
            
                    //Se invoca conexion a base de datos
                    include('conusu.php');
                    //Se realiza consulta a la tabla
                    $consulta="SELECT * FROM usuarios where PERFILES_idPerfil = 3";
                    //Se ejecuta consulta
                    $resultado=mysqli_query($conexion, $consulta);
                    //Se realiza ciclo para leer tabla y llenar los option
                    while ($registro = mysqli_fetch_array($resultado)){            
                        echo "
                            <option value=".$registro['CodUsu'].">"
                                           .$registro['CodUsu']."
                            </option>
                            ";
                    }
            
                echo "</select>";
                }else{
                    echo "<input type='text' name='Estado' value=".$registro['Estado']." class='input-48'>";
                }
            ?>
            
             <input type="file" name="Anexo" required>    
            
            <input type="submit" value="ENTREGAR A CALIDAD" class="btn-enviar">
            
        </div>
    </form>
</body>
</html>