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
                <th colspan="5" class="form__titulo">ELIMINAR DE PROVEEDORES</th>       
               </tr>
               
               <tr>
                <th colspan="1" rowspan="1" align="center">IDENTIFICACIÓN</th>
                <th colspan="1" rowspan="1" align="center">NOMBRE</th>
                <th colspan="1" rowspan="1" align="center">TIPO DE DOCUMENTO</th>
                <th colspan="1" rowspan="1" align="center">TELÉFONO</th>
                <th colspan="1" rowspan="1" align="center">DIRECCIÓN</th>
                
               </tr>
            </thead>
            
            <tbody>
                <?php
                    $numeroIdent=$_REQUEST['numeroIdent'];
                
                    include('configuracion.php');
                
                    //$consulta="SELECT * FROM proveedor";
                    $consulta="SELECT * FROM proveedor WHERE numeroIdent='$numeroIdent'";
                
                    $resultado=mysqli_query($conexion, $consulta);
            
                    while ($registro = mysqli_fetch_array($resultado)){
                        echo "
                            <tr>
                                <td width='150'>".$registro['numeroIdent']."</td>
                                <td width='150'>".$registro['nombre']."</td>
                                <td width='150'>".$registro['tipoIdent']."</td>
                                <td width='150'>".$registro['telefono']."</td>
                                <td width='700'>".$registro['direccion']."</td>
                                                                                            
                            </tr>
                            ";
                    }   
                ?>
            </tbody>    
        </table>
    </div>
    
    <div class="contenedor-inputs">    
       
        
      <input type="button" value="ELIMINAR REGISTRO" class="btn-enviar" onclick="eliminarregistro('<?php echo "$numeroIdent"; ?>')" >
      <script>
          function eliminarregistro(numeroIdent){
                  
                  window.location.href='eliminar.php?del_numeroIdent=' + numeroIdent+'';
                  return true;
              
          }
      </script>
                    
    </div>
    
    
    
</body>
</html>