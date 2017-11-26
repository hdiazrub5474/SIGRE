<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Formulario de Registro</title>
    <link rel="stylesheet" href="css/estilos_cambiologin.css">
</head>
<body>
   <h1><img src="img/logo_sigre_2.jpg" alt="" class="logo"></h1>
    <form action="registrarcambio.php" method="post" class="form-register">
        <h2 class="form__titulo">CAMBIO DE CLAVE</h2>
        <div class="contenedor-inputs">
            
            <input type="password" name="contrasena0" placeholder="Contraseña Actual" class="input-48" required>
            <input type="password" name="contrasena1" placeholder="Contraseña Nueva" class="input-48" required>
            <input type="password" name="contrasena2" placeholder="Confirmar Contraseña" class="input-48" required>        
            
            <input type="submit" value="REALIZAR CAMBIO" class="btn-enviar">
            
        </div>
    </form>
    <div>
        <a href="../menu.php">
            <img src="img/menu3.jpg" class="ImagenMenu">
        </a>
    </div>
</body>
</html>