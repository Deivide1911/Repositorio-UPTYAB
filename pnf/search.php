<?php
include("../control/conexion.php");
$redireccion = 'search(usuario).php';
include("../control/validacion(usuario).php");
include('../control/validacionmain.php');
include('../control/searchControl.php');
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proyectos</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Urbanist:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/all.css">
    <link rel="stylesheet" href="../estilos/maincss.css">
    <link rel="icon" type="image/x-icon" href="../img/icon.png">
</head>
<body>
<header class="logo">
        <a href="main.php"><img src="../img/logomin.png" alt="logo" width="150px" height="70px"></a>
        <nav class="dropmenu">
        <ul>
            <li><p class="re"><a><i class="fa-solid fa-bars"></i> Selecciona un PNF</p></li>
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
        <a href="#" class="re">Nosotros</a>
        <a href="#" class="re">Estadistica</a>
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

    <form action="search.php" method="POST" class="barradebusqueda">
        <fieldset class="fieldset">
            <input type="search" placeholder="Buscar en el repositorio..." name="buscar" class="buscador">
            <button type="submit" name="btn" class="botondebusqueda"><i class="fa-solid fa-magnifying-glass"></i></button>
        </fieldset>
        <div class="cont-busq">
            <select name="pnf" id="pnf" class="busq">
                <option value="a">Seleccione un PNF</option>
                <option value="informatica">Informática</option>
                <option value="administracion">Administración</option>
                <option value="agroalimentacion">Agroalimentación</option>
                <option value="enfermeria">Enfermería</option>
                <option value="higiene_laboral">Higiene & Seguridad Laboral</option>
                <option value="avanzada">Avanzada</option>
            </select>
            <select name="trayecto" id="trayecto" class="busq">
                <option value="a">Seleccione un trayecto</option>
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
            </select>
            <select name="tproyecto" id="tproyecto" class="busq">
                <option value="a">Seleccione un tipo de proyecto</option>
                <option>Sociotecnológico</option>
                <option>Comunitario</option>
            </select>
            <button type="submit" name="btn" class="botondebusqueda"><i class="fa-solid fa-magnifying-glass"></i></button>
        </div>
        <input type="hidden" class="control" name="control" value='<?= $control?>'>
    </form>
    <div class="center-searchadmin">
        <button class="btn-act">Búsqueda Más Específica</button>
        <a href="upload.php" class="blueone">Subir mi proyecto</a>
        <a href="inhabilitados.php" class="blueone">Ver proyectos inhabilitados</a>
    </div>
    <table class="tablasearch">
        <tr>
            <th>Título</th>
            <th>Trayecto</th>
            <th>Tipo de proyecto</th>
            <th>Autores</th>
            <th>Etiquetas</th>
            <th>PNF</th>
            <th>PDF</th>
            <th>Descarga</th>
        </tr>
        <?php while($mostrar = mysqli_fetch_array($consulta)){
            $idpnf = $mostrar['idpnf'];
            $consul_idpnf = $conexion->query("SELECT * FROM pnf where idpnf='$idpnf'");
            $nombrepnf = mysqli_fetch_array($consul_idpnf);
        ?>
        <tr>
            <td><?php echo $mostrar['titulo'] ?></td>
            <td><?php echo $mostrar['trayecto'] ?></td>
            <td><?php echo $mostrar['tipoproyecto'] ?></td>
            <td><?php echo $mostrar['autores'] ?></td>
            <td><?php echo $mostrar['etiquetas'] ?></td>
            <td><?php echo $nombrepnf['pnf_nombre']  ?></td>
            <td><a class="blueone" href="<?php echo $mostrar['ruta'] ?>" target="_blank">Ver</a></td>
            <td><a class="blueone" href="<?php echo $mostrar['ruta'] ?>" download="<?php echo $mostrar['archivo'] ?>">Descargar</a></td>
            <td><a class="blueone" href="edit.php?id=<?php echo $mostrar['id']?>">Editar</a></td>
            <td><a class="blueone" href="inhabilitar.php?id=<?php echo $mostrar['id']?>&direccion=search">Inhabilitar</a></td>
        </tr>
        <?php  } ?>
    </table>
</body>
<script src="../js/search.js"></script>
</html>
