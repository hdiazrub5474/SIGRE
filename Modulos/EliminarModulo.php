<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Consultar Usuarios</title>
    <link rel="stylesheet" href="css/estilos_consulta.css">
    
</head>
<body>
   
   <h1><img src="img/logo_sigre_2.jpg" alt="" class="logo"></h1>    
   
    <div class="datagrid">
        <table cellpadding="2" cellspacing="2">
            <thead>
               <tr>
                <th colspan="6" class="form__titulo">ELIMINAR MODULO</th>       
               </tr>
               
               <tr>
                <th colspan="1" rowspan="1" align="center">NOMBRE</th>
                <th colspan="1" rowspan="1" align="center">CREADO POR:</th>
                <th colspan="1" rowspan="1" align="center">FECHA</th>
                
               </tr>
            </thead>
            
            <tbody>
               
                <?php
                
                    $idMod=$_REQUEST['idMod'];
                
                    include('configuracion.php');
                
                    $consulta="SELECT * FROM modulos WHERE idMod='$idMod'";
                
                    $resultado=mysqli_query($conexion, $consulta);
            
                    while ($registro = mysqli_fetch_array($resultado)){
                        echo "
                            <tr>
                                <td width='150'>".$registro['NomMod']."</td>
                                <td width='150'>".$registro['UsuCre']."</td>
                                <td width='150'>".$registro['FecCre']."</td>
                            </tr>
                            ";
                    }   
                ?>
            </tbody>    
        </table>
    </div>
    
    <div class="contenedor-inputs">    
       
        
      <input type="button" value="ELIMINAR REGISTRO" class="btn-enviar" onclick="eliminarregistro('<?php echo "$idMod"; ?>')" >
      <script>
          function eliminarregistro(idMod){
                  
                  window.location.href='eliminar.php?del_idMod=' + idMod+'';
                  return true;
              
          }
      </script>
                    
    </div>
    
    
    
</body>
</html>