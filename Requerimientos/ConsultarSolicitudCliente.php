<?php
    session_start();
    
    $idNitCli = $_SESSION['id_Cliente'];
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
                <th align="left"><font color=white >Requerimiento</font></th>
                <th>
                    <input type="text" name="XRequerimiento" align="right">
                </th>
                <th></th>
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
                <th colspan="13" class="form__titulo">CONSULTA DE SOLICITUDES</th>       
               </tr>
               
               <tr class="titulo_lista">
                <th colspan="1" rowspan="1" align="center">No Solicitud</th>
                <th colspan="1" rowspan="1" align="center">Código</th>
                <th colspan="1" rowspan="1" align="center">Solicitud</th>
                <th colspan="1" rowspan="1" align="center">Tipo</th>
                <th colspan="1" rowspan="1" align="center">Estado</th>
                <th colspan="1" rowspan="1" align="center">Modulo</th>
                <th colspan="1" rowspan="1" align="center">Fecha Solicitud</th>
                <th colspan="1" rowspan="1" align="center">Fecha Entrega</th>
                
                
                <th colspan="3" rowspan="1" align="center">FUNCION</th>
               </tr>
            </thead>
            
            <tbody>
                <?php
                    include('conusu.php');
                
                    $where = "where CLIENTES_NitCli ='".$idNitCli."'";
                    
                    if (isset($_POST['XRequerimiento']))
                    {
                        $buscar_XRequerimiento = $_POST['XRequerimiento'];
                    }
                    if (isset($_POST['XTipo']))
                    {
                        $buscar_XTipo = $_POST['XTipo'];
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
                                                $where = " where CLIENTES_NitCli ='".$idNitCli."'";
                                            } else
                                            {
                                                $where = " where FecSol <='".$buscar_XFecFin."' and CLIENTES_NitCli ='".$idNitCli."'";
                                            }
                                        } else
                                        {
                                            if (empty($_POST['XFecFin']))
                                            {
                                                $where = " where FecSol >='".$buscar_XFecIni."' and CLIENTES_NitCli ='".$idNitCli."'";;
                                            } else
                                            {
                                                $where = " where FecSol <='".$buscar_XFecFin."' and FecSol >='".$buscar_XFecIni."' and CLIENTES_NitCli ='".$idNitCli."'";
                                            }
                                        }
                                    }else
                                    {
                                        if (empty($_POST['XFecIni']))
                                        {
                                            if (empty($_POST['XFecFin']))
                                            {
                                                $where = " where Estado ='".$buscar_XEstado."' and CLIENTES_NitCli ='".$idNitCli."'";
                                            } else
                                            {
                                                $where = " where FecSol <='".$buscar_XFecFin."' and Estado ='".$buscar_XEstado."' and CLIENTES_NitCli ='".$idNitCli."'";
                                            }
                                        } else
                                        {
                                            if (empty($_POST['XFecFin']))
                                            {
                                                $where = " where FecSol >='".$buscar_XFecIni."' and Estado ='".$buscar_XEstado."' and CLIENTES_NitCli ='".$idNitCli."'";;
                                            } else
                                            {
                                                $where = " where FecSol <='".$buscar_XFecFin."' and FecSol >='".$buscar_XFecIni."' and Estado ='".$buscar_XEstado."' and CLIENTES_NitCli ='".$idNitCli."'";
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
                                                $where = " where TipSol ='".$buscar_XTipo."' and CLIENTES_NitCli ='".$idNitCli."'";
                                            } else
                                            {
                                                $where = " where FecSol <='".$buscar_XFecFin."' and TipSol ='".$buscar_XTipo."' and CLIENTES_NitCli ='".$idNitCli."'";
                                            }
                                        } else
                                        {
                                            if (empty($_POST['XFecFin']))
                                            {
                                                $where = " where FecSol >='".$buscar_XFecIni."' and TipSol ='".$buscar_XTipo."' and CLIENTES_NitCli ='".$idNitCli."'";
                                            } else
                                            {
                                                $where = " where FecSol <='".$buscar_XFecFin."' and FecSol >='".$buscar_XFecIni."' and TipSol ='".$buscar_XTipo."' and CLIENTES_NitCli ='".$idNitCli."'";
                                            }
                                        }
                                    }else
                                    {
                                        if (empty($_POST['XFecIni']))
                                        {
                                            if (empty($_POST['XFecFin']))
                                            {
                                                $where = " where Estado ='".$buscar_XEstado."' and TipSol ='".$buscar_XTipo."' and CLIENTES_NitCli ='".$idNitCli."'";
                                            } else
                                            {
                                                $where = " where FecSol <='".$buscar_XFecFin."' and Estado ='".$buscar_XEstado."' and TipSol ='".$buscar_XTipo."' and CLIENTES_NitCli ='".$idNitCli."'";
                                            }
                                        } else
                                        {
                                            if (empty($_POST['XFecFin']))
                                            {
                                                $where = " where FecSol >='".$buscar_XFecIni."' and Estado ='".$buscar_XEstado."' and TipSol ='".$buscar_XTipo."' and CLIENTES_NitCli ='".$idNitCli."'";
                                            } else
                                            {
                                                $where = " where FecSol <='".$buscar_XFecFin."' and FecSol >='".$buscar_XFecIni."' and Estado ='".$buscar_XEstado."' and TipSol ='".$buscar_XTipo."' and CLIENTES_NitCli ='".$idNitCli."'";
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
                                                $where = " where CLIENTES_NitCli ='".$idNitCli."'";
                                            } else
                                            {
                                                $where = " where FecSol <='".$buscar_XFecFin."' and CLIENTES_NitCli ='".$idNitCli."'";
                                            }
                                        } else
                                        {
                                            if (empty($_POST['XFecFin']))
                                            {
                                                $where = " where FecSol >='".$buscar_XFecIni."' and CLIENTES_NitCli ='".$idNitCli."'";
                                            } else
                                            {
                                                $where = " where FecSol <='".$buscar_XFecFin."' and FecSol >='".$buscar_XFecIni."' and CLIENTES_NitCli ='".$idNitCli."'";
                                            }
                                        }
                                    }else
                                    {
                                        if (empty($_POST['XFecIni']))
                                        {
                                            if (empty($_POST['XFecFin']))
                                            {
                                                $where = " where Estado ='".$buscar_XEstado."' and CLIENTES_NitCli ='".$idNitCli."'";
                                            } else
                                            {
                                                $where = " where FecSol <='".$buscar_XFecFin."' and Estado ='".$buscar_XEstado."' and CLIENTES_NitCli ='".$idNitCli."'";
                                            }
                                        } else
                                        {
                                            if (empty($_POST['XFecFin']))
                                            {
                                                $where = " where FecSol >='".$buscar_XFecIni."' and Estado ='".$buscar_XEstado."' and CLIENTES_NitCli ='".$idNitCli."'";;
                                            } else
                                            {
                                                $where = " where FecSol <='".$buscar_XFecFin."' and FecSol >='".$buscar_XFecIni."' and Estado ='".$buscar_XEstado."' and CLIENTES_NitCli ='".$idNitCli."'";
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
                                                $where = " where TipSol <='".$buscar_XTipo."' and CLIENTES_NitCli ='".$idNitCli."'";
                                            } else
                                            {
                                                $where = " where FecSol <='".$buscar_XFecFin."' and TipSol ='".$buscar_XTipo."' and CLIENTES_NitCli ='".$idNitCli."'";
                                            }
                                        } else
                                        {
                                            if (empty($_POST['XFecFin']))
                                            {
                                                $where = " where FecSol >='".$buscar_XFecIni."' and TipSol ='".$buscar_XTipo."' and CLIENTES_NitCli ='".$idNitCli."'";
                                            } else
                                            {
                                                $where = " where FecSol <='".$buscar_XFecFin."' and FecSol >='".$buscar_XFecIni."' and TipSol ='".$buscar_XTipo."' and CLIENTES_NitCli ='".$idNitCli."'";
                                            }
                                        }
                                    }else
                                    {
                                        if (empty($_POST['XFecIni']))
                                        {
                                            if (empty($_POST['XFecFin']))
                                            {
                                                $where = " where Estado ='".$buscar_XEstado."' and TipSol ='".$buscar_XTipo."' and CLIENTES_NitCli ='".$idNitCli."'";
                                            } else
                                            {
                                                $where = " where FecSol <='".$buscar_XFecFin."' and Estado ='".$buscar_XEstado."' and TipSol ='".$buscar_XTipo."' and CLIENTES_NitCli ='".$idNitCli."'";
                                            }
                                        } else
                                        {
                                            if (empty($_POST['XFecFin']))
                                            {
                                                $where = " where FecSol >='".$buscar_XFecIni."' and Estado ='".$buscar_XEstado."' and TipSol ='".$buscar_XTipo."' and CLIENTES_NitCli ='".$idNitCli."'";
                                            } else
                                            {
                                                $where = " where FecSol <='".$buscar_XFecFin."' and FecSol >='".$buscar_XFecIni."' and Estado ='".$buscar_XEstado."' and TipSol ='".$buscar_XTipo."' and CLIENTES_NitCli ='".$idNitCli."'";
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
                                                $where = "where idReq ='".$buscar_XRequerimiento."' and CLIENTES_NitCli ='".$idNitCli."'";
                                            } else
                                            {
                                                $where = " where FecSol <='".$buscar_XFecFin."' and idReq ='".$buscar_XRequerimiento."' and CLIENTES_NitCli ='".$idNitCli."'";
                                            }
                                        } else
                                        { 
                                            if (empty($_POST['XFecFin']))
                                            {
                                                $where = " where FecSol >='".$buscar_XFecIni."' and idReq ='".$buscar_XRequerimiento."' and CLIENTES_NitCli ='".$idNitCli."'";
                                            } else
                                            {
                                                $where = " where FecSol <='".$buscar_XFecFin."' and FecSol >='".$buscar_XFecIni."' and idReq ='".$buscar_XRequerimiento."' and CLIENTES_NitCli ='".$idNitCli."'";
                                            }
                                        }
                                    }else
                                    {
                                        if (empty($_POST['XFecIni']))
                                        {
                                            if (empty($_POST['XFecFin']))
                                            {
                                                $where = " where Estado ='".$buscar_XEstado."' and idReq ='".$buscar_XRequerimiento."' and CLIENTES_NitCli ='".$idNitCli."'";
                                            } else
                                            {
                                                $where = " where FecSol <='".$buscar_XFecFin."' and Estado ='".$buscar_XEstado."' and idReq ='".$buscar_XRequerimiento."' and CLIENTES_NitCli ='".$idNitCli."'";
                                            }
                                        } else
                                        {
                                            if (empty($_POST['XFecFin']))
                                            {
                                                $where = " where FecSol >='".$buscar_XFecIni."' and Estado ='".$buscar_XEstado."' and idReq ='".$buscar_XRequerimiento."' and CLIENTES_NitCli ='".$idNitCli."'";
                                            } else
                                            {
                                                $where = " where FecSol <='".$buscar_XFecFin."' and FecSol >='".$buscar_XFecIni."' and Estado ='".$buscar_XEstado."' and idReq ='".$buscar_XRequerimiento."' and CLIENTES_NitCli ='".$idNitCli."'";
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
                                                $where = " where TipSol ='".$buscar_XTipo."' and idReq ='".$buscar_XRequerimiento."' and CLIENTES_NitCli ='".$idNitCli."'";
                                            } else
                                            {
                                                $where = " where FecSol <='".$buscar_XFecFin."' and TipSol ='".$buscar_XTipo."' and idReq ='".$buscar_XRequerimiento."' and CLIENTES_NitCli ='".$idNitCli."'";
                                            }
                                        } else
                                        {
                                            if (empty($_POST['XFecFin']))
                                            {
                                                $where = " where FecSol >='".$buscar_XFecIni."' and TipSol ='".$buscar_XTipo."' and idReq ='".$buscar_XRequerimiento."' and CLIENTES_NitCli ='".$idNitCli."'";
                                            } else
                                            {
                                                $where = " where FecSol <='".$buscar_XFecFin."' and FecSol >='".$buscar_XFecIni."' and TipSol ='".$buscar_XTipo."' and idReq ='".$buscar_XRequerimiento."' and CLIENTES_NitCli ='".$idNitCli."'";
                                            }
                                        }
                                    }else
                                    {
                                        if (empty($_POST['XFecIni']))
                                        {
                                            if (empty($_POST['XFecFin']))
                                            {
                                                $where = " where Estado ='".$buscar_XEstado."' and TipSol ='".$buscar_XTipo."' and idReq ='".$buscar_XRequerimiento."' and CLIENTES_NitCli ='".$idNitCli."'";
                                            } else
                                            {
                                                $where = " where FecSol <='".$buscar_XFecFin."' and Estado ='".$buscar_XEstado."' and TipSol ='".$buscar_XTipo."' and idReq ='".$buscar_XRequerimiento."' and CLIENTES_NitCli ='".$idNitCli."'";
                                            }
                                        } else
                                        {
                                            if (empty($_POST['XFecFin']))
                                            {
                                                $where = " where FecSol >='".$buscar_XFecIni."' and Estado ='".$buscar_XEstado."' and TipSol ='".$buscar_XTipo."' and idReq ='".$buscar_XRequerimiento."' and CLIENTES_NitCli ='".$idNitCli."'";
                                            } else
                                            {
                                                $where = " where FecSol <='".$buscar_XFecFin."' and FecSol >='".$buscar_XFecIni."' and Estado ='".$buscar_XEstado."' and TipSol ='".$buscar_XTipo."' and idReq ='".$buscar_XRequerimiento."' and CLIENTES_NitCli ='".$idNitCli."'";
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
                                                $where = " where CLIENTES_NitCli ='".$idNitCli."' and idReq ='".$buscar_XRequerimiento."'";
                                            } else
                                            {
                                                $where = " where FecSol <='".$buscar_XFecFin."' and CLIENTES_NitCli ='".$idNitCli."' and idReq ='".$buscar_XRequerimiento."'";
                                            }
                                        } else
                                        {
                                            if (empty($_POST['XFecFin']))
                                            {
                                                $where = " where FecSol >='".$buscar_XFecIni."' and CLIENTES_NitCli ='".$idNitCli."' and idReq ='".$buscar_XRequerimiento."'";
                                            } else
                                            {
                                                $where = " where FecSol <='".$buscar_XFecFin."' and FecSol >='".$buscar_XFecIni."' and CLIENTES_NitCli ='".$idNitCli."' and idReq ='".$buscar_XRequerimiento."'";
                                            }
                                        }
                                    }else
                                    {
                                        if (empty($_POST['XFecIni']))
                                        {
                                            if (empty($_POST['XFecFin']))
                                            {
                                                $where = " where Estado ='".$buscar_XEstado."' and CLIENTES_NitCli ='".$idNitCli."' and idReq ='".$buscar_XRequerimiento."'";
                                            } else
                                            {
                                                $where = " where FecSol <='".$buscar_XFecFin."' and Estado ='".$buscar_XEstado."' and CLIENTES_NitCli ='".$idNitCli."' and idReq ='".$buscar_XRequerimiento."'";
                                            }
                                        } else
                                        {
                                            if (empty($_POST['XFecFin']))
                                            {
                                                $where = " where FecSol >='".$buscar_XFecIni."' and Estado ='".$buscar_XEstado."' and CLIENTES_NitCli ='".$idNitCli."' and idReq ='".$buscar_XRequerimiento."'";
                                            } else
                                            {
                                                $where = " where FecSol <='".$buscar_XFecFin."' and FecSol >='".$buscar_XFecIni."' and Estado ='".$buscar_XEstado."' and CLIENTES_NitCli ='".$idNitCli."' and idReq ='".$buscar_XRequerimiento."'";
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
                                                $where = " where TipSol ='".$buscar_XTipo."' and  CLIENTES_NitCli ='".$idNitCli."' and idReq ='".$buscar_XRequerimiento."'";
                                            } else
                                            {
                                                $where = " where FecSol <='".$buscar_XFecFin."' and TipSol ='".$buscar_XTipo."' and CLIENTES_NitCli ='".$idNitCli."' and idReq ='".$buscar_XRequerimiento."'";
                                            }
                                        } else
                                        {
                                            if (empty($_POST['XFecFin']))
                                            {
                                                $where = " where FecSol >='".$buscar_XFecIni."' and TipSol <='".$buscar_XTipo."' and CLIENTES_NitCli ='".$idNitCli."' and idReq ='".$buscar_XRequerimiento."'";
                                            } else
                                            {
                                                $where = " where FecSol <='".$buscar_XFecFin."' and FecSol >='".$buscar_XFecIni."' and TipSol ='".$buscar_XTipo."' and CLIENTES_NitCli ='".$idNitCli."' and idReq ='".$buscar_XRequerimiento."'";
                                            }
                                        }
                                    }else
                                    {
                                        if (empty($_POST['XFecIni']))
                                        {
                                            if (empty($_POST['XFecFin']))
                                            {
                                                $where = " where Estado ='".$buscar_XEstado."' and TipSol ='".$buscar_XTipo."' and CLIENTES_NitCli ='".$idNitCli."' and idReq ='".$buscar_XRequerimiento."'";
                                            } else
                                            {
                                                $where = " where FecSol <='".$buscar_XFecFin."' and Estado ='".$buscar_XEstado."' and TipSol ='".$buscar_XTipo."' and CLIENTES_NitCli ='".$idNitCli."' and idReq ='".$buscar_XRequerimiento."'";
                                            }
                                        } else
                                        {
                                            if (empty($_POST['XFecFin']))
                                            {
                                                $where = " where FecSol >='".$buscar_XFecIni."' and Estado ='".$buscar_XEstado."' and TipSol ='".$buscar_XTipo."' and CLIENTES_NitCli ='".$idNitCli."' and idReq ='".$buscar_XRequerimiento."'";
                                            } else
                                            {
                                                $where = " where FecSol <='".$buscar_XFecFin."' and FecSol >='".$buscar_XFecIni."' and Estado ='".$buscar_XEstado."' and TipSol ='".$buscar_XTipo."' and CLIENTES_NitCli ='".$idNitCli."' and idReq ='".$buscar_XRequerimiento."'";
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                
                    
                                
                    $userlogin = $_SESSION['usuario_logueado'];
                
                
                    $consulta="SELECT * FROM solicitud JOIN clientes JOIN modulos JOIN calidad ON solicitud.CLIENTES_Nitcli = clientes.Nitcli and solicitud.MODULOS_idMod = modulos.idMod and solicitud.CALIDAD_CodInt = calidad.CodInt $where ORDER BY solicitud.idReq ASC";
                    
                
                    $resultado=mysqli_query($conexion, $consulta);
            
                    while ($registro = mysqli_fetch_array($resultado)){
                        echo "
                            <tr>
                                <td width='150'>".$registro['idReq']."</td>
                                <td width='150'>".$registro['CodInt']."</td>
                                <td width='150'><a href='DetalleRequerimiento.php?idReq=".$registro['idReq']."'>".$registro['NomReq']."</a></td>
                                <td width='150'>".$registro['TipSol']."</td>
                                <td width='150'>".$registro['Estado']."</td>
                                <td width='150'>".$registro['NomMod']."</td>
                                <td width='150'>".$registro['FecSol']."</td>
                                <td width='150'>".$registro['FecEnt']."</td>
                                                                
                                
                                <td width='150'><a href='ModificarRequerimiento.php?idReq=".$registro['idReq']."'>Anular</a></td>
                                <td width='150'><a href='CerrarRequerimiento.php?idReq=".$registro['idReq']."'>Cerrar</a></td>
                                                                                                
                            </tr>
                            ";
                    }   
                ?>
            </tbody>    
        </table>
    </div>
        <input type="button" onclick="tableToExcel('myTable', 'Solicitudes')" value="Exportar a Excel" class="Excel">
    </div>
    
    <script src="http://code.jquery.com/jquery-1.12.0.min.js"></script>
    <script src="js/TableToExcel.js"></script>    
    
</body>
</html>