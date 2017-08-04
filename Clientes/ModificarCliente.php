<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Formulario de Registro</title>
    <link rel="stylesheet" href="css/estilos_proveedor.css">
    
    <script>
        function Deshabilitar(){
            var numeroIdent = document.getElementById("numeroIdent");
            //numeroIdent.disabled = true;
        }
    </script>
    
</head>
<body onload="Deshabilitar()">
   <h1><img src="img/logo.jpg" alt="" class="logo"></h1>
    <form action="ModProveedor.php"  method="post" class="form-register">
        <h2 class="form__titulo">MODIFICAR PROVEEDORES</h2>
        <div class="contenedor-inputs">
           
           <?php
            
            $numeroIdent=$_REQUEST['numeroIdent'];
            
            //Se invoca conexion a base de datos
            include('configuracion.php');
            //Se realiza consulta a la tabla
            $consulta="SELECT * FROM proveedor WHERE numeroIdent='$numeroIdent'";
            //Se ejecuta consulta
            $resultado=mysqli_query($conexion, $consulta);
            $registro = mysqli_fetch_array($resultado);
            
                
            //echo $registro['nombres'];
            
            ?>
           
           
            <input type="text" name="numeroIdent" value="<?php echo $registro['numeroIdent'] ?>" placeholder="Identificación" class="input-100" id="numeroIdent" required>
            <input type="text" name="nombre" value="<?php echo $registro['nombre'] ?>" placeholder="Nombre" class="input-100" required>
            <!--<input type="text" name="tipoIdent" placeholder="tipo de identificación" class="input-100" required>-->
            <select name="tipoIdent" class="input-100" required>
                <option value="<?php echo $registro['tipoIdent'] ?>"><?php echo $registro['tipoIdent'] ?></option>
                <option value="NIT">NIT</option>
                <option value="CC">CEDULA</option>
            </select>
            
            
            <input type="text" name="telefono" value="<?php echo $registro['telefono'] ?>" placeholder="telefono" class="input-100" required>
            <input type="text" name="direccion" value="<?php echo $registro['direccion'] ?>" placeholder="direccion" class="input-100" required>
            <input type="submit" value="MODIFICAR REGISTRAR" class="btn-enviar">
            
        </div>
    </form>
</body>
</html>