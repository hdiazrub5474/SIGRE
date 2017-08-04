<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Formulario de Registro</title>
    <link rel="stylesheet" href="css/estilos_usuario.css">
</head>
<body>
   <h1><img src="img/logo_sigre_2.jpg" alt="" class="logo"></h1>
    <form action="registrarUsuario.php" method="post" class="form-register">
        <h2 class="form__titulo">REGISTRAR USUARIOS</h2>
        <div class="contenedor-inputs">
            <input type="text" name="NitUsu" placeholder="Identificación" class="input-100" required>
            <input type="text" name="NomUsu" placeholder="Nombre" class="input-100" required>
            <input type="text" name="NroTel" 
            placeholder="Teléfono" class="input-100" required>
            <input type="email" name="Email" 
            placeholder="Correo Electrónico" class="input-100" required>
            <input type="text" name="CodUsu" placeholder="Usuario" class="input-48" required>
            <input type="password" name="Clave" placeholder="Contraseña" class="input-48" required>
            
            <!--Se realiza option con invocacion a la base de datos - tabla de Clientes-->
            
            <select name="NitCli" class="input-48">
                <option value="">Seleccionar Cliente</option>
            
            <?php
                //Se invoca conexion a base de datos
                include('configuracion.php');
                //Se realiza consulta a la tabla
                $consulta="SELECT * FROM clientes";
                //Se ejecuta consulta
                $resultado=mysqli_query($conexion, $consulta);
                //Se realiza ciclo para leer tabla y llenar los option
                while ($registro = mysqli_fetch_array($resultado)){            
                    echo "
                            <option value=".$registro['NitCli'].">"
                                           .$registro['NomCli']."
                            </option>
                        ";
                }
            ?>
            </select>
            
            <!--Se realiza option con invocacion a la base de datos - tabla de Perfiles-->
            
            <select name="idPerfil" class="input-48">
                <option value="">Seleccionar Perfil</option>
            
            <?php
                //Se invoca conexion a base de datos
                include('configuracion.php');
                //Se realiza consulta a la tabla
                $consulta="SELECT * FROM perfiles";
                //Se ejecuta consulta
                $resultado=mysqli_query($conexion, $consulta);
                //Se realiza ciclo para leer tabla y llenar los option
                while ($registro = mysqli_fetch_array($resultado)){            
                    echo "
                            <option value=".$registro['idPerfil'].">"
                                           .$registro['NomPer']."
                            </option>
                        ";
                }
            ?>
            </select>
            
            
            <input type="submit" value="REGISTRAR" class="btn-enviar">
            
        </div>
    </form>
</body>
</html>