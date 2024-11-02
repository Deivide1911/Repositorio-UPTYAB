<?php 
include('./control/validacion(index).php');
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="estilos(nuevo index)/style.css">
    <link rel="icon" type="image/x-icon" href="images/icon.png">
</head>
<div class="logo">
    <a href="register.php"><img src="images (nuevo index)/logomin.png" alt="logo" class="logo-uptyab"></a>
    <div class="sub-div">
        <h2 class="texto1">REPOSITORIO UPTYAB</h2>
    </div>
</div>

<body>
    <section class="login-container ">
        <form class="login-info-container" method="post">
            <div class="inputs-container">
                <h1 class="titulo">Registrate</h1>
                <input type="text" placeholder="Primer Nombre" name="pnombre" class="box-text" required>
                <input type="text" placeholder="Segundo Nombre (Opcional)" name="snombre" class="box-text" >
                <input type="text" placeholder="Primer Apellido" name="papellido" class="box-text" required>
                <input type="text" placeholder="Segundo Apellido (Opcional)" name="sapellido" class="box-text" >
                <input type="date" placeholder="Fecha de nacimiento" name="fecha" class="box-text" required>
                <label for="">Ingresa tu sexo</label>
                <div class="sex cntr">
                    <label for="hombre">Hombre</label>
                    <input type="radio" name="sexo" id="hombre" class="sex1" value="Hombre">
                    <label for="mujer">Mujer</label>
                    <input type="radio" name="sexo" id="mujer" class="sex1" value="Mujer">
                </div>
                <input type="text" placeholder="Cédula" name="ci" class="box-text" required>
                <input type="password" placeholder="Contraseña" name="contraseña" class="box-text" required>
                <p>¿Tienes cuenta? <span class="span"><a href="index.php">Logueate</a></span></p>
                <input type="submit" class="btn button" name="btn">
                
            </div>
        </form>
        <?php
            include("./control/registro.php");
        ?>
        <aside>
            <img src="images (nuevo index)/resgi.gif" alt="s" class="image-container">
        </aside>
    </section>
</body>
</html>