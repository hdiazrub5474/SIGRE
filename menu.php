<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
     <meta name="viewport" content="width-device-width, user-scalable-no, initial-scale=1, maxumum-scale=1, minimum-scale=1">
    <title>Menu Horizontal</title>
    <link rel="stylesheet" href="css/estilos.css">
    
</head>
<body>
    <header>
        <input type="checkbox" id="btn-menu">
        <label for="btn-menu"><img src="img/icono-menu.png" alt="" class="icono">
        </label>
        <nav class="menu">
            <ul>
                                
                <li class="submenu"><a href="#">Usuarios<span class="icon-dowm-open"></span></a>
                    <ul>
                      <?php   
                        
                       session_start();
                       $nivel = $_SESSION['nivel_usuario'];

                       if ($nivel == 1 || $nivel == 2){
                           
                         echo "<li><a href='usuario.php'>Registrar Usuario</a></li>";
                         echo "<li><a href='Consultar_Usuarios/ConsultarUsuarios.php'>Consultar Usuario</a></li>";
                       }
                        
                      ?>   
                        
                        <li><a href="Cambio_Login/cambio_login.php">Cambio de clave</a></li>
                    </ul>
                </li>
                
                
                <li class="submenu"><a href="#">Clientes</a>
                    <ul>
                        <li><a href="Clientes/Cliente.html">Registrar Cliente</a></li>
                        <li><a href="Clientes/ConsultarCliente.php">Consultar Cliente</a></li>
                    </ul>
                </li>
                <li class="submenu"><a href="#">Modulos</a>
                    <ul>
                        <li><a href="Modulos/Modulo.html">Registrar Modulo</a></li>
                        <li><a href="Modulos/ConsultarModulo.php">Consultar Modulo</a></li>
                    </ul>
                </li>
                <li class="submenu"><a href="">Requerimientos</a>
                    <ul>
                        <li><a href="Requerimientos/ConsultarRequerimientos.php">Consultar Solicitudes</a></li>
                        <li><a href="#">Consultar Ventas</a></li>
                    </ul>
                </li>
                <li><a href="Nosotros/Nosotros.html">Nosotros</a></li>
            </ul>
            
        </nav>
    </header>
    <main>
        <h1>Sistemas de Información de Gestión y Registro de Requerimientos</h1>
        <p><img src="" alt="" class="logo"></p>
        
    </main>
</body>
</html>
