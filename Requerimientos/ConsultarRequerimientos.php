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
                    <!--input type="text" name="XEstado">-->
                    <select name="XEstado" id="" class="selector" >
                        <option value="">Seleccionar Estado</option>
                        <option value="">Pendiente Asignacion</option>
                    </select>
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
                    <input type="submit" value="Buscar" name="Boton_buscar">
                </th>
               </tr>
                
               
            </thead>
       </table>
   
    </form>
   </div>
   
     
    <div class="datagrid">
        <table cellpadding="2" cellspacing="2" class="lista">
            <thead>
               <tr>
                <th colspan="13" class="form__titulo">CONSULTA DE SOLICITUDES</th>       
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
                
                <th colspan="2" rowspan="1" align="center">FUNCION</th>
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
                                                $where = " where FecSol >='".$buscar_XFecIni."' and Estado ='".$buscar_XEstado."' and TipSol ='".$buscar_XTipo."'";;
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
                                                $where = " where FecSol >='".$buscar_XFecIni."' and Estado ='".$buscar_XEstado."' and CLIENTES_NitCli ='".$buscar_XCliente."'";;
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
                
                    
                
                
                    $consulta="SELECT * FROM solicitud JOIN clientes JOIN modulos ON solicitud.CLIENTES_Nitcli = clientes.Nitcli and solicitud.MODULOS_idMod = modulos.idMod $where";
                    
                
                    $resultado=mysqli_query($conexion, $consulta);
            
                    while ($registro = mysqli_fetch_array($resultado)){
                        echo "
                            <tr>
                                <td width='150'>".$registro['idReq']."</td>
                                <td width='150'><a href='#'>".$registro['NomReq']."</a></td>
                                <td width='150'>".$registro['NomCli']."</td>
                                <td width='150'>".$registro['TipSol']."</td>
                                <td width='150'>".$registro['Estado']."</td>
                                <td width='150'>".$registro['NomMod']."</td>
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