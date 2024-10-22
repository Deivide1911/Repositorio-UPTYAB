<?php 
include('./control/validacion(index).php');
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="estilos(nuevo index)/styleindex.css">
    <link rel="icon" type="image/x-icon" href="images/icon.png">
</head>
<header class="logo">
    <a href="index.php"><img src="images (nuevo index)/logomin.png" alt="logo" class="logo-uptyab"></a>
    <div class="sub-div">
        <h2 class="texto1">REPOSITORIO UPTYAB</h2>
    </div>
</header>

<body>
    <section class="login-container ">
        <form class="login-info-container" method="post">
            <div class="inputs-container">
                <h1 class="titulo">Iniciar Sesión</h1>
                <?php 
                    include('./control/login.php');
                ?>
                <input type="text" placeholder="Cedula" name="id" class="box-text">
                <input type="password" placeholder="Cotraseña" name="contraseña" class="box-text">
                <p>¿Olvidaste tu contraseña? <span class="span">Haz click</span></p>
                <input type="submit" class="btn button" name="btn">
                <p>¿No tienes cuenta? <span class="span"><a href="./register.php">Registrate</a></span></p>
            </div>
        </form>
        <aside>
            <img src="images (nuevo index)/sad.gif" alt="s" class="image-container">
        </aside>
    </section>
</body>
</html>
