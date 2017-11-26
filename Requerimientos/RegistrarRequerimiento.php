<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Formulario de Registro</title>
    <link rel="stylesheet" href="css/estilos_requerimientos.css">
</head>
<body>
   <h1><img src="img/logo_sigre_2.jpg" alt="" class="logo"></h1>
    <form action="CrearSolicitud.php" method="post" class="form-register" enctype="multipart/form-data">
        <h2 class="form__titulo">REGISTRAR REQUERIMIENTO</h2>
        <div class="contenedor-inputs">
            <input type="text" name="CodInt" placeholder="Código" class="input-48" required>
            <input type="text" name="NomReq" placeholder="Nombre Requerimiento" class="input-100" required>
            <!--<input type="textarea" name="DesReq" placeholder="Detalle" class="input-100" required>-->
            <textarea name="DesReq" placeholder="Detalle" class="input-textarea" required>
                
            </textarea>

            <select name="TipSol" class="input-48" required >
                <option value="">Tipo de Solicitud</option>
                <option value="Nuevo Desarrollo">Nuevo Desarrollo</option>
                <option value="Soporte">Soporte</option>
                <option value="Inconformidad">Inconformidad</option>
            </select>
            
            <!--Se realiza option con invocacion a la base de datos - tabla de Modulos-->
            
            <select name="idMod" class="input-48" required  >
                <option value="">Seleccionar Modulo</option>
            
            <?php
                //Se invoca conexion a base de datos
                include('conusu.php');
                //Se realiza consulta a la tabla
                $consulta="SELECT * FROM modulos";
                //Se ejecuta consulta
                $resultado=mysqli_query($conexion, $consulta);
                //Se realiza ciclo para leer tabla y llenar los option
                while ($registro = mysqli_fetch_array($resultado)){            
                    echo "
                            <option value=".$registro['idMod'].">"
                                           .$registro['NomMod']."
                            </option>
                        ";
                }
            ?>
            </select>
            
            <input type="file" name="Anexo" required>
    
            <input type="submit" value="REGISTRAR" class="btn-enviar">
            
        </div>
    </form>
    <div>
         <a href="../menu.php">
            <img src="img/menu3.jpg" class="ImagenMenu">
        </a>
    </div>
</body>
</html>