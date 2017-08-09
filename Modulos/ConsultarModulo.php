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
                <th colspan="11" class="form__titulo">CONSULTA DE MODULOS</th>       
               </tr>
               
               <tr>
                <th colspan="1" rowspan="1" align="center">NOMBRE MODULO</th>
                <th colspan="1" rowspan="1" align="center">CREADO POR:</th>
                <th colspan="1" rowspan="1" align="center">FECHA CREACION</th>
                <th colspan="2" rowspan="1" align="center">FUNCION</th>
               </tr>
            </thead>
            
            <tbody>
                <?php
                    include('configuracion.php');
                
                    $consulta="SELECT * FROM modulos";
                                    
                    $resultado=mysqli_query($conexion, $consulta);
            
                    while ($registro = mysqli_fetch_array($resultado)){
                        echo "
                            <tr>
                                <td width='300'>".$registro['NomMod']."</td>
                                <td width='300'>".$registro['UsuCre']."</td>
                                <td width='300'>".$registro['FecCre']."</td>
                                                                
                                <td width='150'><a href='ModificarModulo.php?idMod=".$registro['idMod']."'>Modificar</a></td>
                                <td width='150'><a href='EliminarModulo.php?idMod=".$registro['idMod']."'>Eliminar</a></td>
                                
                                
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