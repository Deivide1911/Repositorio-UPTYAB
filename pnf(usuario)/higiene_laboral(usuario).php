<?php
include("../control/conexion.php");
$redireccion = 'higiene_laboral.php';
include("../control/validacion(admin).php");
$consulta = $conexion->query("SELECT * FROM higiene_laboral where estado = 'Habilitado' order by trayecto asc ");
include('../control/validacionmain.php');
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Higiene y Seguridad Laboral </title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Urbanist:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/all.css">
    <link rel="stylesheet" href="../estilos/maincss.css">
    <link rel="icon" type="image/x-icon" href="../img/icon.png">
</head>

<body>
<header class="logo">
        <a href="main(usuario).php"><img src="../img/logomin.png" alt="logo" width="150px" height="70px"></a>
        <nav class="dropmenu">
        <ul>
            <li><p class="re"><a><i class="fa-solid fa-bars"></i> Selecciona un PNF</p></li></a>
            <li>
        <ul class="contenido">
            <li><a href="informatica(usuario).php" class="pnf"><i class="fa-solid fa-laptop-code"></i> PNF Informatica</a></li>
            <li><a href="administracion(usuario).php" class="pnf"><i class="fa-solid fa-user-tie"></i> PNF Administracion</a></li>
            <li><a href="agroalimentacion(usuario).php" class="pnf"><i class="fa-solid fa-money-bill-wheat"></i> PNF Agroalimentacion</a></li>
            <li><a href="enfermeria(usuario).php" class="pnf"><i class="fa-solid fa-user-nurse"></i> PNF Enfermeria</a></li>
            <li><a href="higiene_laboral(usuario).php" class="pnf"><i class="fa-solid fa-hands-bubbles"></i> PNF Higiene & Seguridad Laboral</a></li>
            <li><a href="avanzada(usuario).php" class="pnf"><i class="fa-solid fa-building-columns"></i> PNF Avanzado</a></li>
        </ul>
        </li>
        </nav>
        <a href="nosotros(usuario).php" class="re">Nosotros</a>
        <nav class="dropmenu">
        <a class="usericon"><i class="fa-solid fa-user"></i>
            Usuario</a>
        <ul>
            <ul class="contenido">
                <li><a href="../control/logout.php"><i class="fa-solid fa-right-from-bracket"></i> Cerrar Sesión</a></li>
                <li><a href="configuracion(usuario).php?id=<?php echo $_SESSION['id'] ?>"><i class="fa-solid fa-gear"></i> Configuracion</a></li>
            </ul>
        </ul>
        </nav>
    </header>
    <form action="search(usuario).php" method="POST" class="barradebusqueda">
        <fieldset class="fieldset">
        <input type="search" placeholder="Buscar en el repositorio..." name="buscar" class="buscador">
        <input type="hidden" name="control" value="0">
        <button type="submit" name="btn" class="botondebusqueda"><i class="fa-solid fa-magnifying-glass"></i></button>
        </fieldset>
    </form>
    <h2>Higiene y Seguridad Laboral </h2>
        <table class="tablasearch">
            <tr>
                <th>Título</th>
                <th>Trayecto</th>
                <th>Tipo de proyecto</th>
                <th>Autores</th>
                <th>Etiquetas</th>
                <th>PDF</th>
            </tr>
            <?php while($mostrar = mysqli_fetch_array($consulta)){
            ?>
            <tr>
                <td><?php echo $mostrar['titulo'] ?></td>
                <td><?php echo $mostrar['trayecto'] ?></td>
                <td><?php echo $mostrar['tipoproyecto'] ?></td>
                <td><?php echo $mostrar['autores'] ?></td>
                <td><?php echo $mostrar['etiquetas'] ?></td>
                <td><a class=blueone href="vistaprevia.php?ruta=<?php echo $mostrar['ruta'] ?>" target="_blank">Ver</a></td>
            </tr>
            <?php  } ?>
        </table>
    
</body>
</html>