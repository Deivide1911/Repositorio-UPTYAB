<?php 
    include('../control/conexion.php');
    $redireccion ='configuracion(usuario).php';
    include("../control/validacion(usuario).php");
    $id = $_GET['id'];
    $consulta = $conexion->query("SELECT * FROM usuarioinformacion where usuarioinfoid = '$id'");
    $consulta2 = $conexion->query("SELECT * FROM usuario where id = '$id'");
    $mostrar2 = mysqli_fetch_array($consulta2);
    $mostrar = mysqli_fetch_array($consulta);
    $pnombre = $mostrar['primernombre'];
    $snombre = $mostrar['segundonombre'];
    $papellido = $mostrar['primerapellido'];
    $sapellido = $mostrar['segundoapellido'];
    $sexo = $mostrar['sexo'];
    $fecha = $mostrar['fecha'];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edita tu cuenta</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Urbanist:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/all.css">
    <link rel="stylesheet" href="../estilos/maincss.css">
    <link rel="stylesheet" href="../estilos/style.css">
    <link rel="icon" type="image/x-icon" href="../img/icon.png">
</head>
<body>
<header class="logo">
        <a href="main.php"><img src="../img/logomin.png" alt="logo" width="150px" height="70px"></a>
        <nav class="dropmenu">
        <ul>
            <li><p class="re"><a><i class="fa-solid fa-bars"></i> Selecciona un PNF</p></li></a>
            <li>
        <ul class="contenido">
            <li><a href="informatica.php" class="pnf"><i class="fa-solid fa-laptop-code"></i> PNF Informatica</a></li>
            <li><a href="administracion.php" class="pnf"><i class="fa-solid fa-user-tie"></i> PNF Administracion</a></li>
            <li><a href="agroalimentacion.php" class="pnf"><i class="fa-solid fa-money-bill-wheat"></i> PNF Agroalimentacion</a></li>
            <li><a href="enfermeria.php" class="pnf"><i class="fa-solid fa-user-nurse"></i> PNF Enfermeria</a></li>
            <li><a href="higiene_laboral.php" class="pnf"><i class="fa-solid fa-hands-bubbles"></i> PNF Higiene & Seguridad Laboral</a></li>
            <li><a href="avanzada.php" class="pnf"><i class="fa-solid fa-building-columns"></i> PNF Avanzado</a></li>
        </ul>
        </li>
        
        </nav>
        <a href="nosotros.php" class="re">Nosotros</a>
        <a href="../reportes/reporte.php" class="re">Reportes</a>
        <nav class="dropmenu cerrarsesion">
        <a class="usericon"><i class="fa-solid fa-user"></i>
            Admin</a>
        <ul>
            <ul class="contenido">
            <li><a href="../control/logout.php"><i class="fa-solid fa-right-from-bracket"></i> Cerrar Sesión</a></li>
            <li><a href="configuracion.php?id=<?php echo $_SESSION['id']?>"><i class="fa-solid fa-gear"></i> Configuracion</a></li>
            <li><a href="upload.php"><i class="fa-solid fa-file-arrow-up"></i> Subir Proyectos</a></li>
            </ul>
        </ul>
        </nav>
    </header>
    <form class="todo" method="post">
        <h3>Edita tu cuenta</h3>
        <input class="hola" value="<?=$pnombre?>" type="text" name="pnombre" id="primer-nombre" placeholder="Ingresa tu Primer Nombre" required>
        <input class="hola" value="<?=$snombre?>"  type="text" name="snombre" id="segundo-nombre" placeholder="Ingresa tu Segundo Nombre" required>
        <input class="hola" value="<?=$papellido?>"  type="text" name="papellido" id="primer-apellido" placeholder="Ingresa tu Primer Apellido" required>
        <input class="hola" value="<?=$sapellido?>"  type="text" name="sapellido" id="segundo-apellido" placeholder="Ingresa tu Segundo Apellido" required>
        <input class="hola" value="<?=$mostrar2['id']?>"  type="text" name="ci" id="cedula" placeholder="Ingresa tu Cedula" required readonly>
        <p class="parrafo">Seleccione su sexo</p>     
            <label for="sexo1" class="gen">
                <input type="radio" id="sexo1" name="sexo" value="Hombre" <?php if($sexo == 'Hombre'){ echo 'Checked';} ?>>
                    Hombre
            </label>
            <label for="sexo2" class="gen">
                <input type="radio" id="sexo2" name="sexo" value="Mujer" <?php if($sexo == 'Mujer'){ echo 'Checked';} ?>>
                    Mujer
            </label>
        <p class="parrafo">Ingrese su fecha de nacimiento</p>
        <input class="hola" value="<?=$mostrar['fecha']?>" type="date" id="fecha" name="fecha" required>
        <input class="hola"  value="<?=$mostrar2['contraseña']?>"  type="password" name="contraseña" id="pass" placeholder="Ingresa tu Contraseña" required>
        <div class="pers">
            <input type="checkbox" name="mostrar" id="mostrar" class="box">
            <label for="mostrar">Mostrar Contraseña</label>
        </div>
        <input class="botonregreso" type="submit" name="btn" value="Editar">
        <input type="hidden" value=<?=$id?> name="id">
    </form>
</body>
<script src="../js/mostrar.js"></script>
<style>
    .pers{
        display:flex;
    }
</style>
</html>