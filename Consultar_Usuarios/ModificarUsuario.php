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
   <h1><img src="img/logo_sigre_2.jpg" alt="" class="logo"></h1>
    <form action="ModUsuario.php" method="post" class="form-register">
        <h2 class="form__titulo">MODIFICAR USUARIOS</h2>
        <div class="contenedor-inputs">
           
            <?php
            
            $NitUsu=$_REQUEST['NitUsu'];
            
            //Se invoca conexion a base de datos
            include('conusu.php');
            //Se realiza consulta a la tabla
            //$consulta="SELECT * FROM usuario WHERE idUsuario='$idUsuario'";
            $consulta="SELECT * FROM usuarios JOIN perfiles JOIN clientes ON usuarios.PERFILES_idPerfil = perfiles.idPerfil and usuarios.NitCli = clientes.NitCli WHERE NitUsu='$NitUsu'" ;
            //Se ejecuta consulta
            $resultado=mysqli_query($conexion, $consulta);
            $registro = mysqli_fetch_array($resultado);
            
                
            //echo $registro['nombres'];
            
            ?>
            
            <input type="hidden" name="NitUsu" value="<?php echo $registro['NitUsu'] ?>">
            <input type="text" name="NomUsu" value="<?php echo $registro['NomUsu'] ?>" placeholder="Nombres" class="input-100" required>
            <input type="text" name="NroTel" value="<?php echo $registro['NroTel'] ?>" placeholder="Teléfono" class="input-100" required>
            <input type="email" name="Email" value="<?php echo $registro['Email'] ?>" placeholder="Correo" class="input-100" required>
            <input type="text" name="CodUsu" value="<?php echo $registro['CodUsu'] ?>" placeholder="Usuario" class="input-48" required>
            <input type="password" name="Clave" value="<?php echo $registro['Clave'] ?>" placeholder="Contraseña" class="input-48" required>
            
            
            <!--Se realiza option con invocacion a la base de datos - tabla de Clientes-->
            
            <select name="NitCli" class="input-48">
                <option value="<?php echo $registro['NitCli'] ?>"><?php echo $registro['NomCli'] ?></option>
            
            <?php
                //Se invoca conexion a base de datos
                include('configuracion.php');
                //Se realiza consulta a la tabla
                $consultaClientes="SELECT * FROM clientes";
                //Se ejecuta consulta
                $resultadoClientes=mysqli_query($conexion, $consultaClientes);
                //Se realiza ciclo para leer tabla y llenar los option
                while ($registroClientes = mysqli_fetch_array($resultadoClientes)){            
                    echo "
                            <option value=".$registroClientes['NitCli'].">"
                                           .$registroClientes['NomCli']."
                            </option>
                        ";
                }
            ?>
            </select>
            
            
            <!--Se realiza option con invocacion a la base de datos-->
            
            <select name="Perfil" class="input-48">
                <option value="<?php echo $registro['idPerfil'] ?>"><?php echo $registro['NomPer'] ?></option>
            
            
            
            
            <?php
                
                //Se invoca conexion a base de datos
                include('conusu.php');
                //Se realiza consulta a la tabla
                $consultaPerfil="SELECT * FROM perfiles";
                //Se ejecuta consulta
                $resultadoPerfil=mysqli_query($conexion, $consultaPerfil);
                //Se realiza ciclo para leer tabla y llenar los option
                while ($registroPerfil = mysqli_fetch_array($resultadoPerfil)){            
                    echo "
                            <option value=".$registroPerfil['idPerfil'].">"
                                           .$registroPerfil['NomPer']."
                            </option>
                        ";
                }
            ?>
            </select>
            
            
            <input type="submit" value="MODIFICAR REGISTRO" class="btn-enviar">
            
        </div>
    </form>
    <div>
        <a href="../menu.php">
            <img src="img/menu3.jpg" class="ImagenMenu">
        </a>
    </div>
    
</body>
</html>