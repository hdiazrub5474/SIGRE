    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Consultar Usuarios</title>
    <link rel="stylesheet" href="css/estilos_consulta.css">
    <link rel="stylesheet" href="EliminarRegistros.js">
</head>
<body>
   
   <h1><img src="img/logo.jpg" alt="" class="logo"></h1>    
   <!--<h2 class="form__titulo">CONSULTAR USUARIOS</h2>-->
    <div class="datagrid">
        <table cellpadding="2" cellspacing="2">
            <thead>
               <tr>
                <th colspan="6" class="form__titulo">ELIMINAR DE USUARIOS</th>       
               </tr>
               
               <tr>
                <th colspan="1" rowspan="1" align="center">ID</th>
                <th colspan="1" rowspan="1" align="center">NOMBRE</th>
                <th colspan="1" rowspan="1" align="center">APELLIDO</th>
                <th colspan="1" rowspan="1" align="center">EMAIL</th>
                <th colspan="1" rowspan="1" align="center">USUARIO</th>
                <th colspan="1" rowspan="1" align="center">ROL</th>
                
               </tr>
            </thead>
            
            <tbody>
                <?php
                    $username=$_REQUEST['username'];
                    //echo "$username";
                    include('conusu.php');
                
                    //$consulta="SELECT * FROM usuario";
                    $consulta="SELECT * FROM usuario JOIN rol ON usuario.Rol_idRol = rol.idRol WHERE usuario.username='$username'";
                
                    $resultado=mysqli_query($conexion, $consulta);
            
                    while ($registro = mysqli_fetch_array($resultado)){
                        echo "
                            <tr>
                                <td width='150'>".$registro['idUsuario']."</td>
                                <td width='150'>".$registro['nombres']."</td>
                                <td width='150'>".$registro['apellidos']."</td>
                                <td width='150'>".$registro['email']."</td>
                                <td width='150'>".$registro['username']."</td>
                                <td width='150'>".$registro['nombre']."</td>
                                
                                
                                
                            </tr>
                            ";
                    }   
                ?>
            </tbody>    
        </table>
        
    </div>
    
    <div class="contenedor-inputs">    
       
        
      <input type="button" value="ELIMINAR REGISTRO" class="btn-enviar" onclick="eliminarregistro('<?php echo "$username"; ?>')" >
      <script>
          function eliminarregistro(username){
                  
                  window.location.href='eliminar.php?del_username=' + username+'';
                  return true;
              
          }
      </script>
                    
    </div>
    
</body>
</html>