<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Formulario de Registro</title>
    <link rel="stylesheet" href="css/estilos_cliente.css">
    
    <script>
        function Deshabilitar(){
            var numeroIdent = document.getElementById("NitCli");
            //numeroIdent.disabled = true;
        }
    </script>
    
</head>
<body onload="Deshabilitar()">
   <h1><img src="img/logo_sigre_2.jpg" alt="" class="logo"></h1>
    <form action="ModCliente.php"  method="post" class="form-register">
        <h2 class="form__titulo">MODIFICAR CLIENTES</h2>
        <div class="contenedor-inputs">
           
           <?php
            
            $NitCli=$_REQUEST['NitCli'];
            
            //Se invoca conexion a base de datos
            include('configuracion.php');
            //Se realiza consulta a la tabla
            $consulta="SELECT * FROM clientes WHERE NitCli='$NitCli'";
            //Se ejecuta consulta
            $resultado=mysqli_query($conexion, $consulta);
            $registro = mysqli_fetch_array($resultado);
                                    
            ?>
           
           
            <input type="hidden" name="NitCli" value="<?php echo $registro['NitCli'] ?>" placeholder="Identificación" class="input-100" id="numeroIdent" required>
            <input type="text" name="NomCli" value="<?php echo $registro['NomCli'] ?>" placeholder="Nombre" class="input-100" required>
            <input type="text" name="NroTel" value="<?php echo $registro['NroTel'] ?>" placeholder="Teléfono" class="input-100" required>
            <input type="text" name="Email" value="<?php echo $registro['Email'] ?>" placeholder="Correo" class="input-100" required>
            <input type="text" name="NomDir" value="<?php echo $registro['NomDir'] ?>" placeholder="Direccion" class="input-100" required>
            <input type="text" name="NomCiu" value="<?php echo $registro['NomCiu'] ?>" placeholder="Ciudad" class="input-100" required>
            <input type="submit" value="MODIFICAR REGISTRAR" class="btn-enviar">
            
        </div>
    </form>
    <div>
        <a href="../menu.php">
            <img src="img/menu3.jpg" class="ImagenMenu">
        </a>
    </div>
</body>
</html>