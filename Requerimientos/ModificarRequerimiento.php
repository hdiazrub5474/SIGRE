<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Formulario de Registro</title>
    <link rel="stylesheet" href="css/estilos_usuario.css">
    
    <script>
        function Deshabilitar(){
            var Idnombres = document.getElementById("idNombres");
            var Idapellidos = document.getElementById("idApellidos");
            Idnombres.disabled = true;
            Idapellidos.disabled = true;
            
            
        }
    </script>
    
</head>
<body>
   <h1><img src="img/logo.jpg" alt="" class="logo"></h1>
    <form action="ModUsuario.php" method="post" class="form-register">
        <h2 class="form__titulo">MODIFICAR USUARIOS</h2>
        <div class="contenedor-inputs">
           
            <?php
            
            $idUsuario=$_REQUEST['idUsuario'];
            
            //Se invoca conexion a base de datos
            include('conusu.php');
            //Se realiza consulta a la tabla
            //$consulta="SELECT * FROM usuario WHERE idUsuario='$idUsuario'";
            $consulta="SELECT * FROM usuario JOIN rol ON usuario.Rol_idRol = rol.idRol WHERE idUsuario='$idUsuario'";
            //Se ejecuta consulta
            $resultado=mysqli_query($conexion, $consulta);
            $registro = mysqli_fetch_array($resultado);
            
                
            //echo $registro['nombres'];
            
            ?>
            
            <input type="hidden" name="idUsuario" value="<?php echo $registro['idUsuario'] ?>">
            <input type="text" name="nombres" value="<?php echo $registro['nombres'] ?>" placeholder="Nombre" class="input-100" id="idNombres"required>
            <input type="text" name="apellidos" value="<?php echo $registro['apellidos'] ?>" placeholder="Apellidos" class="input-100" id="idApellidos" required>
            <input type="email" name="email" value="<?php echo $registro['email'] ?>" placeholder="correo" class="input-100" required>
            <input type="text" name="username" value="<?php echo $registro['username'] ?>" placeholder="usuario" class="input-48" required>
            <input type="password" name="contrasena" value="<?php echo $registro['contrasena'] ?>" placeholder="contraseña" class="input-48" required>
            
            <!--Se realiza option con invocacion a la base de datos-->
            
            <select name="Rol_idRol">
                <option value="<?php echo $registro['idRol'] ?>"><?php echo $registro['nombre'] ?></option>
            
            <?php
                
               
                
                //Se invoca conexion a base de datos
                include('conusu.php');
                //Se realiza consulta a la tabla
                $consulta="SELECT * FROM rol";
                //Se ejecuta consulta
                $resultado=mysqli_query($conexion, $consulta);
                //Se realiza ciclo para leer tabla y llenar los option
                while ($registro = mysqli_fetch_array($resultado)){            
                    echo "
                            <option value=".$registro['idRol'].">"
                                           .$registro['nombre']."
                            </option>
                        ";
                }
            ?>
            </select>
            
            
            <input type="submit" value="MODIFICAR REGISTRO" class="btn-enviar">
            
        </div>
    </form>
</body>
</html>