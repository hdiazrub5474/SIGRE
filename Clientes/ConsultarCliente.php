<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Consultar Usuarios</title>
    <link rel="stylesheet" href="css/estilos_consulta.css">
</head>
<body>
   
   <h1><img src="img/logo.jpg" alt="" class="logo"></h1>    
   <!--<h2 class="form__titulo">CONSULTAR USUARIOS</h2>-->
    <div class="datagrid">
        <table cellpadding="2" cellspacing="2">
            <thead>
               <tr>
                <th colspan="7" class="form__titulo">CONSULTA DE PROVEEDORES</th>       
               </tr>
               
               <tr>
                <th colspan="1" rowspan="1" align="center">IDENTIFICACIÓN</th>
                <th colspan="1" rowspan="1" align="center">NOMBRE</th>
                <th colspan="1" rowspan="1" align="center">TIPO DE DOCUMENTO</th>
                <th colspan="1" rowspan="1" align="center">TELÉFONO</th>
                <th colspan="1" rowspan="1" align="center">DIRECCIÓN</th>
                <th colspan="2" rowspan="1" align="center">FUNCION</th>
               </tr>
            </thead>
            
            <tbody>
                <?php
                    include('configuracion.php');
                
                    //$consulta="SELECT * FROM proveedor";
                    $consulta="SELECT * FROM proveedor";
                
                    $resultado=mysqli_query($conexion, $consulta);
            
                    while ($registro = mysqli_fetch_array($resultado)){
                        echo "
                            <tr>
                                <td width='150'>".$registro['numeroIdent']."</td>
                                <td width='150'>".$registro['nombre']."</td>
                                <td width='150'>".$registro['tipoIdent']."</td>
                                <td width='150'>".$registro['telefono']."</td>
                                <td width='700'>".$registro['direccion']."</td>
                                                                
                                <td width='150'><a href='ModificarProveedor.php?numeroIdent=".$registro['numeroIdent']."'>Modificar</a></td>
                                <td width='150'><a href='EliminarProveedor.php?numeroIdent=".$registro['numeroIdent']."'>Eliminar</a></td>
                                
                                
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