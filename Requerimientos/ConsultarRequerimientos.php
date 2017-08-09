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
   
   <div>
      <form action="" method="post">
       <table class="tabla">
           <thead>
                           
               <tr>
                <th align="left">Cliente</th>
                <th>
                    <input type="text" name="XCliente" align="right">
                </th>
                <th></th>
                <th align="left">Requerimiento</th>
                <th align="center">
                    <input type="text" name="XRequerimiento">
                </th>
               </tr>
               
               <tr>
                <th align="left">Tipo</th>
                <th>
                    <input type="text" name="XTipo" align="right">
                </th>
                <th></th>
                <th align="left">Estado</th>
                <th align="center">
                    <input type="text" name="XEstado">
                </th>
               </tr>
               
               <tr>
                <th align="left">Fecha</th>
                <th align="left">
                    <input type="date" name="XFecIni" align="right">
                </th>
                <th></th>
                
                <th align="left">
                    <input type="date" name="XFecFin">
                </th>
                <th>
                    <input type="submit" value="Buscar" name="buscar">
                </th>
               </tr>
                
               
            </thead>
       </table>
          <!--<input type="submit" value="Buscar" name="buscar">-->
    </form>
   </div>
   
   <!--<div>
       <form action="" class="form_buscar" method="post">
           <label for="">Cliente</label>
           <input type="text" name="xbuscar">
           <input type="submit" value="Buscar" name="buscar">
       
       
       </form>
   </div>-->
   
   
   
    <div class="datagrid">
        <table cellpadding="2" cellspacing="2" class="lista">
            <thead>
               <tr>
                <th colspan="10" class="form__titulo">CONSULTA DE SOLICITUDES</th>       
               </tr>
               
               <tr>
                <th colspan="1" rowspan="1" align="center">No SOLICITUD</th>
                <th colspan="1" rowspan="1" align="center">SOLICITUD</th>
                <th colspan="1" rowspan="1" align="center">ESTADO</th>
                <th colspan="1" rowspan="1" align="center">FECHA SOLICITUD</th>
                <th colspan="1" rowspan="1" align="center">FECHA DESARROLLO</th>
                <th colspan="1" rowspan="1" align="center">FECHA CALIDAD</th>
                <th colspan="1" rowspan="1" align="center">FECHA ENTREGA</th>
                <th colspan="1" rowspan="1" align="center">ASIGNADO A</th>
                
                <th colspan="2" rowspan="1" align="center">FUNCION</th>
               </tr>
            </thead>
            
            <tbody>
                <?php
                    include('conusu.php');
                
                    $where = "";
                
                       
                    if (isset($_POST['XRequerimiento']))
                    {
                        $buscar = $_POST['XRequerimiento'];    
                    } else {
                        $buscar = "";
                    }
                    
                    if (isset($_POST['buscar']))
                    {   
                        if ($buscar == ""){
                        $where = "";     
                        } else{
                        $where = " where idReq='".$buscar."'"; 
                        }
                    }
                
                                                                            
                    $consulta="SELECT * FROM solicitud $where";
                    //$consulta="SELECT CodUsu, NitUsu, NomUsu, usuarios.NroTel, usuarios.Email, usuarios.UsuCre, usuarios.FecCre, NomCli, NomPer FROM usuarios JOIN perfiles JOIN clientes ON usuarios.PERFILES_idPerfil = perfiles.idPerfil and usuarios.NitCli = clientes.NitCli $where";
                    
                    //echo $consulta;
                
                    $resultado=mysqli_query($conexion, $consulta);
            
                    while ($registro = mysqli_fetch_array($resultado)){
                        echo "
                            <tr>
                                <td width='150'>".$registro['idReq']."</td>
                                <td width='150'>".$registro['NomReq']."</td>
                                <td width='150'>".$registro['Estado']."</td>
                                <td width='150'>".$registro['FecSol']."</td>
                                <td width='150'>".$registro['FecDes']."</td>
                                <td width='150'>".$registro['FecCal']."</td>
                                <td width='150'>".$registro['FecEnt']."</td>
                                <td width='150'>".$registro['UsuAsig']."</td>
                                
                                
                                <td width='150'><a href='ModificarUsuario.php?idReq=".$registro['idReq']."'>Modificar</a></td>
                                <td width='150'><a href='EliminarUsuario.php?idReq=".$registro['idReq']."'>Eliminar</a></td>
                                
                                                                
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