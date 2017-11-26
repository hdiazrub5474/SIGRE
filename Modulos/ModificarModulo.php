<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Formulario de Registro</title>
    <link rel="stylesheet" href="css/estilos_cliente.css">
    
</head>
<body>
   <h1><img src="img/logo_sigre_2.jpg" alt="" class="logo"></h1>
    <form action="ModModulo.php"  method="post" class="form-register">
        <h2 class="form__titulo">MODIFICAR MODULOS</h2>
        <div class="contenedor-inputs">
           
           <?php
            
            $idMod=$_REQUEST['idMod'];
            
            //Se invoca conexion a base de datos
            include('configuracion.php');
            //Se realiza consulta a la tabla
            $consulta="SELECT * FROM modulos WHERE idMod='$idMod'";
            //Se ejecuta consulta
            $resultado=mysqli_query($conexion, $consulta);
            $registro = mysqli_fetch_array($resultado);
                                    
            ?>
           
           
            <input type="hidden" name="idMod" value="<?php echo $registro['idMod'] ?>" placeholder="Identificación" class="input-100" required>
            <input type="text" name="NomMod" value="<?php echo $registro['NomMod'] ?>" placeholder="Nombre" class="input-100" required>
            
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