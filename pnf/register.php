<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Urbanist:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/all.css">
    <link rel="stylesheet" href="../estilos/style.css">
    <link rel="icon" type="image/x-icon" href="../img/icon.png">
</head>
<body>
    
    <div class="logo">
        <a href="../index.php"><img src="../img/logo.png" alt="logo" width="150px" height="100px"></a>
        <h1>REPOSITORIO DE LA UPTYAB</h1>
    </div>

    <form class="todo" method="post">
        <h3>Registra tu cuenta</h3>
        <input class="hola" type="text" name="pnombre" id="primer-nombre" placeholder="Ingresa tu Primer Nombre" required>
        <input class="hola" type="text" name="snombre" id="segundo-nombre" placeholder="Ingresa tu Segundo Nombre" required>
        <input class="hola" type="text" name="papellido" id="primer-apellido" placeholder="Ingresa tu Primer Apellido" required>
        <input class="hola" type="text" name="sapellido" id="segundo-apellido" placeholder="Ingresa tu Segundo Apellido" required>
        <input class="hola" type="text" name="ci" id="cedula" placeholder="Ingresa tu Cedula" required>
        <p class="parrafo">Seleccione su sexo</p>
        <label for="sexo1" class="gen">
        <input type="radio" id="sexo1" name="sexo" value="Hombre">
        Hombre
        </label>
        <label for="sexo2" class="gen">
        <input type="radio" id="sexo2" name="sexo" value="Mujer">
        Mujer
        </label>
        <p class="parrafo">Ingrese su fecha de nacimiento</p>
        <input class="hola" type="date" id="fecha" name="fecha" required>
        <input class="hola" type="password" name="contrasena" id="pass" placeholder="Ingresa tu Contraseña" required>
        <input type="checkbox" name="mostrar" id="mostrar">
        <label for="mostrar">Mostrar Contraseña</label>
        <input class="botonregreso" type="submit" name="btn" value="Registrar">
        <a href="../index.php">Tengo cuenta</a>
    </form>
    <?php
        include("../control/registro.php");
    ?>
    </body>
    <script src="../js/mostrar.js"></script>
    </html>