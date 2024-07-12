<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Urbanist:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="css/all.css">
    <link rel="stylesheet" href="estilos/style.css">
    <link rel="icon" type="image/x-icon" href="img/icon.png">
</head>
<body>
    
    <div class="logo">
        <a href="index.php"><img src="img/logo.png" alt="logo" width="150px" height="100px"></a>
        <h1>REPOSITORIO DE LA UPTYAB</h1>
    </div>

    <form class="todo" method="post" action="./control/login.php">
        <h3>Ingresa con tu cuenta</h3>
        <input class="hola" type="text" name="id" id="cedula" placeholder="Ingresa tu Cedula" required>
        <input class="hola" type="password" name="contraseña" id="contraseña" placeholder="Ingresa tu Contraseña"
        required>
        <input class="boton" type="submit" value="Entrar" name="btn">
        <a href="pnf/register.html">¿No tienes cuenta?</a>
    </form>
    <?php 
    include("./control/validar.php");
    ?>  
    <footer>
        <div class="container">
            <div class="footer-content">
                <h3 class="footerh3">Contactanos</h4>
                <p class="parrafo">Gmail: </p>
                <p class="parrafo">Celular: </p>
                <p class="parrafo">Dirección: </p>
            </div>
            <div class="footer-content">
                <h3 class="footerh3">Atajos</h3>
                 <ul class="list">
                    <li><a href="">Inicio</a></li>
                    <li><a href="">Acerca de</a></li>
                    <li><a href="">Servicios</a></li>
                    <li><a href="">Contactos</a></li>
                 </ul>
            </div>
            <div class="footer-content">
                <h3 class="footerh3">Redes</h3>
                <ul class="social-icons">
                 <li><a href=""><i class="fab fa-facebook"></i></a></li>
                 <li><a href=""><i class="fab fa-twitter"></i></a></li>
                 <li><a href=""><i class="fab fa-instagram"></i></a></li>
                 <li><a href=""><i class="fab fa-linkedin"></i></a></li>
                </ul>
                </div>
        </div>
        <div class="bottom-bar">
            <p>&copy; 2024-2025 UPTYAB. All rights reserved</p>
        </div>
    </footer>
</body>
<a href="prueba.html">aver</a>
</html>