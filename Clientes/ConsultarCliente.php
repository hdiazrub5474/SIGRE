<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Consultar Usuarios</title>
    <link rel="stylesheet" href="css/estilos_consulta.css">
</head>
<body>
   
   <h1><img src="img/logo_sigre_2.jpg" alt="" class="logo"></h1>    
   <!--<h2 class="form__titulo">CONSULTAR USUARIOS</h2>-->
    <div class="datagrid">
        <table cellpadding="2" cellspacing="2">
            <thead>
               <tr>
                <th colspan="11" class="form__titulo">CONSULTA DE CLIENTES</th>       
               </tr>
               
               <tr>
                <th colspan="1" rowspan="1" align="center">IDENTIFICACIÓN</th>
                <th colspan="1" rowspan="1" align="center">NOMBRE</th>
                <th colspan="1" rowspan="1" align="center">TELEFONO</th>
                <th colspan="1" rowspan="1" align="center">EMAIL</th>
                <th colspan="1" rowspan="1" align="center">DIRECCIÓN</th>
                <th colspan="1" rowspan="1" align="center">CIUDAD</th>
                <th colspan="1" rowspan="1" align="center">CREADO POR:</th>
                <th colspan="1" rowspan="1" align="center">FECHA CREACION</th>
                <th colspan="2" rowspan="1" align="center">FUNCION</th>
               </tr>
            </thead>
            
            <tbody>
                <?php
                    include('configuracion.php');
                
                    $consulta="SELECT * FROM clientes";
                                    
                    $resultado=mysqli_query($conexion, $consulta);
            
                    while ($registro = mysqli_fetch_array($resultado)){
                        echo "
                            <tr>
                                <td width='150'>".$registro['NitCli']."</td>
                                <td width='150'>".$registro['NomCli']."</td>
                                <td width='150'>".$registro['NroTel']."</td>
                                <td width='150'>".$registro['Email']."</td>
                                <td width='700'>".$registro['NomDir']."</td>
                                <td width='700'>".$registro['NomCiu']."</td>
                                <td width='700'>".$registro['UsuCre']."</td>
                                <td width='700'>".$registro['FecCre']."</td>
                                                                
                                <td width='150'><a href='ModificarCliente.php?NitCli=".$registro['NitCli']."'>Modificar</a></td>
                                <td width='150'><a href='EliminarCliente.php?NitCli=".$registro['NitCli']."'>Eliminar</a></td>
                                
                                
                            </tr>
                            ";
                    }   
                ?>
            </tbody>    
        </table>
    </div>
        <a href="../menu.php">
            <img src="img/menu3.jpg" class="ImagenMenu">
        </a>    
    </div>
    
    
    
</body>
</html>