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
                <th colspan="11" class="form__titulo">CONSULTA DE USUARIOS</th>       
               </tr>
               
               <tr>
                <th colspan="1" rowspan="1" align="center">USUARIO</th>
                <th colspan="1" rowspan="1" align="center">IDENTIFICACION</th>
                <th colspan="1" rowspan="1" align="center">NOMBRE</th>
                <th colspan="1" rowspan="1" align="center">TELEFONO</th>
                <th colspan="1" rowspan="1" align="center">EMAIL</th>
                <th colspan="1" rowspan="1" align="center">CREADO POR:</th>
                <th colspan="1" rowspan="1" align="center">FECHA CREACION</th>
                <th colspan="1" rowspan="1" align="center">CLIENTE</th>
                <th colspan="1" rowspan="1" align="center">PERFIL</th>
                <th colspan="2" rowspan="1" align="center">FUNCION</th>
               </tr>
            </thead>
            
            <tbody>
                <?php
                    include('conusu.php');
                
                    //$consulta="SELECT * FROM usuario";
                    $consulta="SELECT CodUsu, NitUsu, NomUsu, usuarios.NroTel, usuarios.Email, usuarios.UsuCre, usuarios.FecCre, NomCli, NomPer FROM usuarios JOIN perfiles JOIN clientes ON usuarios.PERFILES_idPerfil = perfiles.idPerfil and usuarios.NitCli = clientes.NitCli";
                
                    $resultado=mysqli_query($conexion, $consulta);
            
                    while ($registro = mysqli_fetch_array($resultado)){
                        echo "
                            <tr>
                                <td width='150'>".$registro['CodUsu']."</td>
                                <td width='150'>".$registro['NitUsu']."</td>
                                <td width='150'>".$registro['NomUsu']."</td>
                                <td width='150'>".$registro['NroTel']."</td>
                                <td width='150'>".$registro['Email']."</td>
                                <td width='150'>".$registro['UsuCre']."</td>
                                <td width='150'>".$registro['FecCre']."</td>
                                <td width='150'>".$registro['NomCli']."</td>
                                <td width='150'>".$registro['NomPer']."</td>
                                
                                <td width='150'><a href='ModificarUsuario.php?NitUsu=".$registro['NitUsu']."'>Modificar</a></td>
                                <td width='150'><a href='EliminarUsuario.php?CodUsu=".$registro['CodUsu']."'>Eliminar</a></td>
                                
                                
                            </tr>
                            ";
                    }   
                ?>
            </tbody>    
        </table>
    </div>
    
    </div>
    
    
    
</body>
</html>