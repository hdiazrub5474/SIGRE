<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Consultar Requerimientos</title>
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
                <th align="left"><font color=white >Cliente</font></th>
                <th>
                    <!--<input type="text" name="XCliente" align="right">-->
                    <select name="XCliente" id="" class="selector" >
                        <option value="">Seleccionar Cliente</option>
                        <?php
                            //Se invoca conexion a base de datos
                            include('conusu.php');
                            //Se realiza consulta a la tabla
                            $consulta="SELECT * FROM clientes";
                            //Se ejecuta consulta
                            $resultado=mysqli_query($conexion, $consulta);
                            //Se realiza ciclo para leer tabla y llenar los option
                            while ($registro = mysqli_fetch_array($resultado)){            
                                echo "
                                        <option value=".$registro['NitCli'].">"
                                                       .$registro['NomCli']."
                                        </option>
                                     ";
                            }
                        ?>
                    </select>
                </th>
                <th></th>
                <th align="left"><font color=white >Requerimiento</font></th>
                <th align="center">
                    <input type="text" name="XRequerimiento">
                </th>
               </tr>
               
               <tr>
                <th align="left"><font color=white >Tipo</font></th>
                <th>
                    <!--<input type="text" name="XTipo" align="right">-->
                    <select name="XTipo" id="" class="selector" >
                        <option value="">Seleccionar Tipo</option>
                        <option value="Nuevo Desarrollo">Nuevo Desarrollo</option>
                        <option value="Soporte">Soporte</option>
                        <option value="Inconformidad">Inconformidad</option>
                    </select>
                </th>
                <th></th>
                <th align="left"><font color=white >Estado</font></th>
                <th align="center">
                    <!--input type="text" name="XEstado">-->
                    <select name="XEstado" id="" class="selector" >
                        <option value="">Seleccionar Estado</option>
                        <option value="Pendiente Asignacion">Pendiente Asignacion</option>
                        <option value="Desarrollo">Desarrollo</option>
                        <option value="Calidad">Calidad</option>
                        <option value="Entregado">Entregado</option>
                        <option value="Cerrado">Cerrado</option>
                        <option value="Anulado">Anulado</option>
                    </select>
                </th>
               </tr>
               
               <tr>
                <th align="left"><font color=white >Fecha</font></th>
                <th align="left">
                    <input type="date" name="XFecIni" align="right">
                </th>
                <th></th>
                
                <th align="left">
                    <input type="date" name="XFecFin">
                </th>
                <th>
                    <input type="submit" value="Buscar" name="Boton_buscar">
                </th>
                
                <th>
                    <a href="../menu.php"><img src="img/menu3.jpg"  width="150" height="30"></a>
                </th>
               </tr>
                
               
            </thead>
       </table>
   
    </form>
   </div>
   
     
    <div class="datagrid">
        <table cellpadding="2" cellspacing="2" class="lista" id="myTable">
            <thead>
               <tr>
                <th colspan="16" class="form__titulo">CONSULTA DE SOLICITUDES</th>       
               </tr>
               
               <tr class="titulo_lista">
                <th colspan="1" rowspan="1" align="center">No Solicitud</th>
                <th colspan="1" rowspan="1" align="center">Código</th>
                <th colspan="1" rowspan="1" align="center">Solicitud</th>
                <th colspan="1" rowspan="1" align="center">Cliente</th>
                <th colspan="1" rowspan="1" align="center">Tipo</th>
                <th colspan="1" rowspan="1" align="center">Estado</th>
                <th colspan="1" rowspan="1" align="center">Modulo</th>
                <th colspan="1" rowspan="1" align="center">Fecha Solicitud</th>
                <th colspan="1" rowspan="1" align="center">Fecha Desarrollo</th>
                <th colspan="1" rowspan="1" align="center">Usuario Calidad</th>
                <th colspan="1" rowspan="1" align="center">Fecha Calidad</th>
                <th colspan="1" rowspan="1" align="center">Fecha Entrega</th>
                <th colspan="1" rowspan="1" align="center">Asignado a</th>
                
                <th colspan="3" rowspan="1" align="center">FUNCION</th>
               </tr>
            </thead>
            
            <tbody>
                <?php
                    include('conusu.php');
                
                    $where = "";
                    
                    if (isset($_POST['XRequerimiento']))
                    {
                        $buscar_XRequerimiento = $_POST['XRequerimiento'];
                    }
                    if (isset($_POST['XCliente']))
                    {
                        $buscar_XCliente = $_POST['XCliente'];
                    }
                    if (isset($_POST['XTipo']))
                    {
                        $buscar_XTipo = $_POST['XTipo'];
                    }
                    if (isset($_POST['XEstado']))
                    {
                        $buscar_XEstado = $_POST['XEstado'];
                    }
                    if (isset($_POST['XFecIni']))
                    {
                        $buscar_XFecIni = $_POST['XFecIni'];
                    }
                    if (isset($_POST['XFecFin']))
                    {
                        $buscar_XFecFin = $_POST['XFecFin'];
                    }
                
                    
                    
                    if (isset($_POST['Boton_buscar']))
                    {
                        if (empty($_POST['XRequerimiento']))
                        {
                            if (empty($_POST['XCliente']))
                            {
                                if (empty($_POST['XTipo']))
                                {
                                    if (empty($_POST['XEstado']))
                                    {
                                        if (empty($_POST['XFecIni']))
                                        {
                                            if (empty($_POST['XFecFin']))
                                            {
                                                $where = "";
                                            } else
                                            {
                                                $where = " where FecSol <='".$buscar_XFecFin."'";
                                            }
                                        } else
                                        {
                                            if (empty($_POST['XFecFin']))
                                            {
                                                $where = " where FecSol >='".$buscar_XFecIni."'";;
                                            } else
                                            {
                                                $where = " where FecSol <='".$buscar_XFecFin."' and FecSol >='".$buscar_XFecIni."'";
                                            }
                                        }
                                    }else
                                    {
                                        if (empty($_POST['XFecIni']))
                                        {
                                            if (empty($_POST['XFecFin']))
                                            {
                                                $where = " where Estado ='".$buscar_XEstado."'";
                                            } else
                                            {
                                                $where = " where FecSol <='".$buscar_XFecFin."' and Estado ='".$buscar_XEstado."'";
                                            }
                                        } else
                                        {
                                            if (empty($_POST['XFecFin']))
                                            {
                                                $where = " where FecSol >='".$buscar_XFecIni."' and Estado ='".$buscar_XEstado."'";;
                                            } else
                                            {
                                                $where = " where FecSol <='".$buscar_XFecFin."' and FecSol >='".$buscar_XFecIni."' and Estado ='".$buscar_XEstado."'";
                                            }
                                        }
                                    }
                                }else
                                {
                                    if (empty($_POST['XEstado']))
                                    {
                                        if (empty($_POST['XFecIni']))
                                        {
                                            if (empty($_POST['XFecFin']))
                                            {
                                                $where = " where TipSol ='".$buscar_XTipo."'";
                                            } else
                                            {
                                                $where = " where FecSol <='".$buscar_XFecFin."' and TipSol ='".$buscar_XTipo."'";
                                            }
                                        } else
                                        {
                                            if (empty($_POST['XFecFin']))
                                            {
                                                $where = " where FecSol >='".$buscar_XFecIni."' and TipSol ='".$buscar_XTipo."'";
                                            } else
                                            {
                                                $where = " where FecSol <='".$buscar_XFecFin."' and FecSol >='".$buscar_XFecIni."' and TipSol ='".$buscar_XTipo."'";
                                            }
                                        }
                                    }else
                                    {
                                        if (empty($_POST['XFecIni']))
                                        {
                                            if (empty($_POST['XFecFin']))
                                            {
                                                $where = " where Estado ='".$buscar_XEstado."' and TipSol ='".$buscar_XTipo."'";
                                            } else
                                            {
                                                $where = " where FecSol <='".$buscar_XFecFin."' and Estado ='".$buscar_XEstado."' and TipSol ='".$buscar_XTipo."'";
                                            }
                                        } else
                                        {
                                            if (empty($_POST['XFecFin']))
                                            {
                                                $where = " where FecSol >='".$buscar_XFecIni."' and Estado ='".$buscar_XEstado."' and TipSol ='".$buscar_XTipo."'";
                                            } else
                                            {
                                                $where = " where FecSol <='".$buscar_XFecFin."' and FecSol >='".$buscar_XFecIni."' and Estado ='".$buscar_XEstado."' and TipSol ='".$buscar_XTipo."'";
                                            }
                                        }
                                    }
                                }
                            } else
                            {
                                if (empty($_POST['XTipo']))
                                {
                                    if (empty($_POST['XEstado']))
                                    {
                                        if (empty($_POST['XFecIni']))
                                        {
                                            if (empty($_POST['XFecFin']))
                                            {
                                                $where = " where CLIENTES_NitCli ='".$buscar_XCliente."'";
                                            } else
                                            {
                                                $where = " where FecSol <='".$buscar_XFecFin."' and CLIENTES_NitCli ='".$buscar_XCliente."'";
                                            }
                                        } else
                                        {
                                            if (empty($_POST['XFecFin']))
                                            {
                                                $where = " where FecSol >='".$buscar_XFecIni."' and CLIENTES_NitCli ='".$buscar_XCliente."'";
                                            } else
                                            {
                                                $where = " where FecSol <='".$buscar_XFecFin."' and FecSol >='".$buscar_XFecIni."' and CLIENTES_NitCli ='".$buscar_XCliente."'";
                                            }
                                        }
                                    }else
                                    {
                                        if (empty($_POST['XFecIni']))
                                        {
                                            if (empty($_POST['XFecFin']))
                                            {
                                                $where = " where Estado ='".$buscar_XEstado."' and CLIENTES_NitCli ='".$buscar_XCliente."'";
                                            } else
                                            {
                                                $where = " where FecSol <='".$buscar_XFecFin."' and Estado ='".$buscar_XEstado."' and CLIENTES_NitCli ='".$buscar_XCliente."'";
                                            }
                                        } else
                                        {
                                            if (empty($_POST['XFecFin']))
                                            {
                                                $where = " where FecSol >='".$buscar_XFecIni."' and Estado ='".$buscar_XEstado."' and CLIENTES_NitCli ='".$buscar_XCliente."'";
                                            } else
                                            {
                                                $where = " where FecSol <='".$buscar_XFecFin."' and FecSol >='".$buscar_XFecIni."' and Estado ='".$buscar_XEstado."' and CLIENTES_NitCli ='".$buscar_XCliente."'";
                                            }
                                        }
                                    }
                                }else
                                {
                                    if (empty($_POST['XEstado']))
                                    {
                                        if (empty($_POST['XFecIni']))
                                        {
                                            if (empty($_POST['XFecFin']))
                                            {
                                                $where = " where TipSol <='".$buscar_XTipo."' and CLIENTES_NitCli ='".$buscar_XCliente."'";
                                            } else
                                            {
                                                $where = " where FecSol <='".$buscar_XFecFin."' and TipSol ='".$buscar_XTipo."' and CLIENTES_NitCli ='".$buscar_XCliente."'";
                                            }
                                        } else
                                        {
                                            if (empty($_POST['XFecFin']))
                                            {
                                                $where = " where FecSol >='".$buscar_XFecIni."' and TipSol ='".$buscar_XTipo."' and CLIENTES_NitCli ='".$buscar_XCliente."'";
                                            } else
                                            {
                                                $where = " where FecSol <='".$buscar_XFecFin."' and FecSol >='".$buscar_XFecIni."' and TipSol ='".$buscar_XTipo."' and CLIENTES_NitCli ='".$buscar_XCliente."'";
                                            }
                                        }
                                    }else
                                    {
                                        if (empty($_POST['XFecIni']))
                                        {
                                            if (empty($_POST['XFecFin']))
                                            {
                                                $where = " where Estado ='".$buscar_XEstado."' and TipSol ='".$buscar_XTipo."' and CLIENTES_NitCli ='".$buscar_XCliente."'";
                                            } else
                                            {
                                                $where = " where FecSol <='".$buscar_XFecFin."' and Estado ='".$buscar_XEstado."' and TipSol ='".$buscar_XTipo."' and CLIENTES_NitCli ='".$buscar_XCliente."'";
                                            }
                                        } else
                                        {
                                            if (empty($_POST['XFecFin']))
                                            {
                                                $where = " where FecSol >='".$buscar_XFecIni."' and Estado ='".$buscar_XEstado."' and TipSol ='".$buscar_XTipo."' and CLIENTES_NitCli ='".$buscar_XCliente."'";
                                            } else
                                            {
                                                $where = " where FecSol <='".$buscar_XFecFin."' and FecSol >='".$buscar_XFecIni."' and Estado ='".$buscar_XEstado."' and TipSol ='".$buscar_XTipo."' and CLIENTES_NitCli ='".$buscar_XCliente."'";
                                            }
                                        }
                                    }
                                }
                            }
                        } else 
                        {
                            if (empty($_POST['XCliente']))
                            {
                                if (empty($_POST['XTipo']))
                                {
                                    if (empty($_POST['XEstado']))
                                    {
                                        if (empty($_POST['XFecIni']))
                                        {
                                            if (empty($_POST['XFecFin']))
                                            {
                                                $where = "where idReq ='".$buscar_XRequerimiento."'";
                                            } else
                                            {
                                                $where = " where FecSol <='".$buscar_XFecFin."' and idReq ='".$buscar_XRequerimiento."'";
                                            }
                                        } else
                                        { 
                                            if (empty($_POST['XFecFin']))
                                            {
                                                $where = " where FecSol >='".$buscar_XFecIni."' and idReq ='".$buscar_XRequerimiento."'";
                                            } else
                                            {
                                                $where = " where FecSol <='".$buscar_XFecFin."' and FecSol >='".$buscar_XFecIni."' and idReq ='".$buscar_XRequerimiento."'";
                                            }
                                        }
                                    }else
                                    {
                                        if (empty($_POST['XFecIni']))
                                        {
                                            if (empty($_POST['XFecFin']))
                                            {
                                                $where = " where Estado ='".$buscar_XEstado."' and idReq ='".$buscar_XRequerimiento."'";
                                            } else
                                            {
                                                $where = " where FecSol <='".$buscar_XFecFin."' and Estado ='".$buscar_XEstado."' and idReq ='".$buscar_XRequerimiento."'";
                                            }
                                        } else
                                        {
                                            if (empty($_POST['XFecFin']))
                                            {
                                                $where = " where FecSol >='".$buscar_XFecIni."' and Estado ='".$buscar_XEstado."' and idReq ='".$buscar_XRequerimiento."'";
                                            } else
                                            {
                                                $where = " where FecSol <='".$buscar_XFecFin."' and FecSol >='".$buscar_XFecIni."' and Estado ='".$buscar_XEstado."' and idReq ='".$buscar_XRequerimiento."'";
                                            }
                                        }
                                    }
                                }else
                                {
                                    if (empty($_POST['XEstado']))
                                    {
                                        if (empty($_POST['XFecIni']))
                                        {
                                            if (empty($_POST['XFecFin']))
                                            {
                                                $where = " where TipSol ='".$buscar_XTipo."' and idReq ='".$buscar_XRequerimiento."'";
                                            } else
                                            {
                                                $where = " where FecSol <='".$buscar_XFecFin."' and TipSol ='".$buscar_XTipo."' and idReq ='".$buscar_XRequerimiento."'";
                                            }
                                        } else
                                        {
                                            if (empty($_POST['XFecFin']))
                                            {
                                                $where = " where FecSol >='".$buscar_XFecIni."' and TipSol ='".$buscar_XTipo."' and idReq ='".$buscar_XRequerimiento."'";
                                            } else
                                            {
                                                $where = " where FecSol <='".$buscar_XFecFin."' and FecSol >='".$buscar_XFecIni."' and TipSol ='".$buscar_XTipo."' and idReq ='".$buscar_XRequerimiento."'";
                                            }
                                        }
                                    }else
                                    {
                                        if (empty($_POST['XFecIni']))
                                        {
                                            if (empty($_POST['XFecFin']))
                                            {
                                                $where = " where Estado ='".$buscar_XEstado."' and TipSol ='".$buscar_XTipo."' and idReq ='".$buscar_XRequerimiento."'";
                                            } else
                                            {
                                                $where = " where FecSol <='".$buscar_XFecFin."' and Estado ='".$buscar_XEstado."' and TipSol ='".$buscar_XTipo."' and idReq ='".$buscar_XRequerimiento."'";
                                            }
                                        } else
                                        {
                                            if (empty($_POST['XFecFin']))
                                            {
                                                $where = " where FecSol >='".$buscar_XFecIni."' and Estado ='".$buscar_XEstado."' and TipSol ='".$buscar_XTipo."' and idReq ='".$buscar_XRequerimiento."'";
                                            } else
                                            {
                                                $where = " where FecSol <='".$buscar_XFecFin."' and FecSol >='".$buscar_XFecIni."' and Estado ='".$buscar_XEstado."' and TipSol ='".$buscar_XTipo."' and idReq ='".$buscar_XRequerimiento."'";
                                            }
                                        }
                                    }
                                }
                            } else
                            {
                                if (empty($_POST['XTipo']))
                                {
                                    if (empty($_POST['XEstado']))
                                    {
                                        if (empty($_POST['XFecIni']))
                                        {
                                            if (empty($_POST['XFecFin']))
                                            {
                                                $where = " where CLIENTES_NitCli ='".$buscar_XCliente."' and idReq ='".$buscar_XRequerimiento."'";
                                            } else
                                            {
                                                $where = " where FecSol <='".$buscar_XFecFin."' and CLIENTES_NitCli ='".$buscar_XCliente."' and idReq ='".$buscar_XRequerimiento."'";
                                            }
                                        } else
                                        {
                                            if (empty($_POST['XFecFin']))
                                            {
                                                $where = " where FecSol >='".$buscar_XFecIni."' and CLIENTES_NitCli ='".$buscar_XCliente."' and idReq ='".$buscar_XRequerimiento."'";
                                            } else
                                            {
                                                $where = " where FecSol <='".$buscar_XFecFin."' and FecSol >='".$buscar_XFecIni."' and CLIENTES_NitCli ='".$buscar_XCliente."' and idReq ='".$buscar_XRequerimiento."'";
                                            }
                                        }
                                    }else
                                    {
                                        if (empty($_POST['XFecIni']))
                                        {
                                            if (empty($_POST['XFecFin']))
                                            {
                                                $where = " where Estado ='".$buscar_XEstado."' and CLIENTES_NitCli ='".$buscar_XCliente."' and idReq ='".$buscar_XRequerimiento."'";
                                            } else
                                            {
                                                $where = " where FecSol <='".$buscar_XFecFin."' and Estado ='".$buscar_XEstado."' and CLIENTES_NitCli ='".$buscar_XCliente."' and idReq ='".$buscar_XRequerimiento."'";
                                            }
                                        } else
                                        {
                                            if (empty($_POST['XFecFin']))
                                            {
                                                $where = " where FecSol >='".$buscar_XFecIni."' and Estado ='".$buscar_XEstado."' and CLIENTES_NitCli ='".$buscar_XCliente."' and idReq ='".$buscar_XRequerimiento."'";
                                            } else
                                            {
                                                $where = " where FecSol <='".$buscar_XFecFin."' and FecSol >='".$buscar_XFecIni."' and Estado ='".$buscar_XEstado."' and CLIENTES_NitCli ='".$buscar_XCliente."' and idReq ='".$buscar_XRequerimiento."'";
                                            }
                                        }
                                    }
                                }else
                                {
                                    if (empty($_POST['XEstado']))
                                    {
                                        if (empty($_POST['XFecIni']))
                                        {
                                            if (empty($_POST['XFecFin']))
                                            {
                                                $where = " where TipSol ='".$buscar_XTipo."' and CLIENTES_NitCli ='".$buscar_XCliente."' and idReq ='".$buscar_XRequerimiento."'";
                                            } else
                                            {
                                                $where = " where FecSol <='".$buscar_XFecFin."' and TipSol ='".$buscar_XTipo."' and CLIENTES_NitCli <='".$buscar_XCliente."' and idReq ='".$buscar_XRequerimiento."'";
                                            }
                                        } else
                                        {
                                            if (empty($_POST['XFecFin']))
                                            {
                                                $where = " where FecSol >='".$buscar_XFecIni."' and TipSol <='".$buscar_XTipo."' and CLIENTES_NitCli ='".$buscar_XCliente."' and idReq ='".$buscar_XRequerimiento."'";
                                            } else
                                            {
                                                $where = " where FecSol <='".$buscar_XFecFin."' and FecSol >='".$buscar_XFecIni."' and TipSol ='".$buscar_XTipo."' and CLIENTES_NitCli ='".$buscar_XCliente."' and idReq ='".$buscar_XRequerimiento."'";
                                            }
                                        }
                                    }else
                                    {
                                        if (empty($_POST['XFecIni']))
                                        {
                                            if (empty($_POST['XFecFin']))
                                            {
                                                $where = " where Estado ='".$buscar_XEstado."' and TipSol ='".$buscar_XTipo."' and CLIENTES_NitCli ='".$buscar_XCliente."' and idReq ='".$buscar_XRequerimiento."'";
                                            } else
                                            {
                                                $where = " where FecSol <='".$buscar_XFecFin."' and Estado ='".$buscar_XEstado."' and TipSol ='".$buscar_XTipo."' and CLIENTES_NitCli ='".$buscar_XCliente."' and idReq ='".$buscar_XRequerimiento."'";
                                            }
                                        } else
                                        {
                                            if (empty($_POST['XFecFin']))
                                            {
                                                $where = " where FecSol >='".$buscar_XFecIni."' and Estado ='".$buscar_XEstado."' and TipSol ='".$buscar_XTipo."' and CLIENTES_NitCli ='".$buscar_XCliente."' and idReq ='".$buscar_XRequerimiento."'";
                                            } else
                                            {
                                                $where = " where FecSol <='".$buscar_XFecFin."' and FecSol >='".$buscar_XFecIni."' and Estado ='".$buscar_XEstado."' and TipSol ='".$buscar_XTipo."' and CLIENTES_NitCli ='".$buscar_XCliente."' and idReq ='".$buscar_XRequerimiento."'";
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                
                    
                
                    //echo $where;        
                
                    //session_start();
                    $userlogin = $_SESSION['usuario_logueado'];
                
                
                    $consulta="SELECT * FROM solicitud JOIN clientes JOIN modulos JOIN calidad ON solicitud.CLIENTES_Nitcli = clientes.Nitcli and solicitud.MODULOS_idMod = modulos.idMod and solicitud.CALIDAD_CodInt = calidad.CodInt $where ORDER BY solicitud.idReq ASC";
                    
                    //echo $consulta;
                
                    $resultado=mysqli_query($conexion, $consulta);
            
                    while ($registro = mysqli_fetch_array($resultado)){
                        echo "
                            <tr>
                                <td width='150'>".$registro['idReq']."</td>
                                <td width='150'>".$registro['CodInt']."</td>
                                <td width='150'><a href='DetalleRequerimiento.php?idReq=".$registro['idReq']."'>".$registro['NomReq']."</a></td>
                                <td width='150'>".$registro['NomCli']."</td>
                                <td width='150'>".$registro['TipSol']."</td>
                                <td width='150'>".$registro['Estado']."</td>
                                <td width='150'>".$registro['NomMod']."</td>
                                <td width='150'>".$registro['FecSol']."</td>
                                <td width='150'>".$registro['FecDes']."</td>
                                <td width='150'>".$registro['UsuCal']."</td>
                                <td width='150'>".$registro['FecCal']."</td>
                                <td width='150'>".$registro['FecEnt']."</td>
                                <td width='150'>".$registro['UsuAsig']."</td>
                                
                                
                                <td width='150'><a href='ModificarRequerimiento.php?idReq=".$registro['idReq']."'>Anular</a></td>
                                <td width='150'><a href='EliminarRequerimiento.php?idReq=".$registro['idReq']."'>Eliminar</a></td>
                                <td width='150'><a href='AsignarRequerimiento.php?idReq=".$registro['idReq']."'>Asignar</a></td>
                                                                
                            </tr>
                            ";
                    }   
                ?>
            </tbody>    
        </table>
    </div>
        <input type="button" onclick="tableToExcel('myTable', 'Solicitudes')" value="Exportar a Excel" class="Excel">
        <!--<a href="../menu.php"><img src="img/menu2.jpg" alt="" class="ImagenMenu"></a>-->
    </div>
    
    <script src="http://code.jquery.com/jquery-1.12.0.min.js"></script>
    <script src="js/TableToExcel.js"></script>    
    
</body>
</html>