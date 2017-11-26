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
                <th colspan="6" class="form__titulo">ELIMINAR DE CLIENTE</th>       
               </tr>
               
               <tr>
                <th colspan="1" rowspan="1" align="center">IDENTIFICACIÓN</th>
                <th colspan="1" rowspan="1" align="center">NOMBRE</th>
                <th colspan="1" rowspan="1" align="center">TELÉFONO</th>
                <th colspan="1" rowspan="1" align="center">CORREO</th>
                <th colspan="1" rowspan="1" align="center">DIRECCIÓN</th>
                <th colspan="1" rowspan="1" align="center">CIUDAD</th>
               </tr>
            </thead>
            
            <tbody>
                <?php
                
                    $NitCli=$_REQUEST['NitCli'];
                
                    include('configuracion.php');
                
                    $consulta="SELECT * FROM clientes WHERE NitCli='$NitCli'";
                
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
                            </tr>
                            ";
                    }   
                ?>
            </tbody>    
        </table>
    </div>
    
    <div class="contenedor-inputs">    
       
        
      <input type="button" value="ELIMINAR REGISTRO" class="btn-enviar" onclick="eliminarregistro('<?php echo "$NitCli"; ?>')" >
      <script>
          function eliminarregistro(NitCli){
                  
                  window.location.href='eliminar.php?del_NitCli=' + NitCli+'';
                  return true;
              
          }
      </script>
                    
    </div>
    <div>
        <a href="../menu.php">
            <img src="img/menu3.jpg" class="ImagenMenu">
        </a>
    </div>    
    
    
</body>
</html>