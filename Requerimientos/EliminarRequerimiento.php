<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Consultar Usuarios</title>
    <link rel="stylesheet" href="css/estilos_consulta.css">
    <link rel="stylesheet" href="css/flexboxgrid.min.css">
    <link rel="stylesheet" href="css/estilos_filtros.css">
</head>
<body>
   
   <h1><img src="img/logo_sigre_2.jpg" alt="" class="logo"></h1>    
      
     
    <div class="datagrid">
        <table cellpadding="2" cellspacing="2" class="lista">
            <thead>
               <tr>
                <th colspan="11" class="form__titulo">ELIMINAR SOLICITUD</th>       
               </tr>
               
               <tr class="titulo_lista">
                <th colspan="1" rowspan="1" align="center">No Solicitud</th>
                <th colspan="1" rowspan="1" align="center">Solicitud</th>
                <th colspan="1" rowspan="1" align="center">Cliente</th>
                <th colspan="1" rowspan="1" align="center">Tipo</th>
                <th colspan="1" rowspan="1" align="center">Estado</th>
                <th colspan="1" rowspan="1" align="center">Modulo</th>
                <th colspan="1" rowspan="1" align="center">Fecha Solicitud</th>
                <th colspan="1" rowspan="1" align="center">Fecha Desarrollo</th>
                <th colspan="1" rowspan="1" align="center">Fecha Calidad</th>
                <th colspan="1" rowspan="1" align="center">Fecha Entrega</th>
                <th colspan="1" rowspan="1" align="center">Asignado a</th>
                
    
               </tr>
            </thead>
            
            <tbody>
                <?php
                
                    include('conusu.php');
                
                    $idReq=$_REQUEST['idReq'];                
                
                    $consulta="SELECT * FROM solicitud JOIN clientes JOIN modulos ON solicitud.CLIENTES_Nitcli = clientes.Nitcli and solicitud.MODULOS_idMod = modulos.idMod where idReq='$idReq'";
                
                    $resultado=mysqli_query($conexion, $consulta);
            
                    while ($registro = mysqli_fetch_array($resultado)){
                        echo "
                            <tr>
                                <td width='150'>".$registro['idReq']."</td>
                                <td width='150'>".$registro['NomReq']."</td>
                                <td width='150'>".$registro['NomCli']."</td>
                                <td width='150'>".$registro['TipSol']."</td>
                                <td width='150'>".$registro['Estado']."</td>
                                <td width='150'>".$registro['NomMod']."</td>
                                <td width='150'>".$registro['FecSol']."</td>
                                <td width='150'>".$registro['FecDes']."</td>
                                <td width='150'>".$registro['FecCal']."</td>
                                <td width='150'>".$registro['FecEnt']."</td>
                                <td width='150'>".$registro['UsuAsig']."</td>
                                
                                                            
                                                                
                            </tr>
                            ";
                    }   
                ?>
            </tbody>    
        </table>
    </div>
    
    <div class="contenedor-inputs">    
       
        
      <input type="button" value="ELIMINAR REGISTRO" class="btn-enviar" onclick="eliminarregistro('<?php echo "$idReq"; ?>')" >
      <script>
          function eliminarregistro(idReq){
                  
                  window.location.href='eliminar.php?del_idReq=' + idReq+'';
                  return true;
              
          }
      </script>
                    
    </div>
    
    
    
</body>
</html>