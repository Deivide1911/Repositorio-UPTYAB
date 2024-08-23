<?php
include('../control/validacionmain.php');
$redireccion = 'main(usuario).php';
include("../control/validacion(usuario).php");
include("../control/conexion.php");
$consulta = $conexion->query("SELECT * FROM (
        SELECT * FROM informatica WHERE estado LIKE 'Habilitado'
        UNION
        SELECT * FROM enfermeria WHERE estado LIKE 'Habilitado'
        UNION
        SELECT * FROM avanzada WHERE estado LIKE 'Habilitado'
        UNION
        SELECT * FROM administracion WHERE estado LIKE 'Habilitado'
        UNION
        SELECT * FROM higiene_laboral WHERE estado LIKE 'Habilitado'
        UNION
        SELECT * FROM agroalimentacion WHERE estado LIKE 'Habilitado'
    ) AS union_resultado
    JOIN fecha f ON union_resultado.id = f.id AND union_resultado.idpnf = f.idpnf
   ORDER BY DATE(f.hora_fecha) DESC, TIME(f.hora_fecha) DESC
   LIMIT 5
");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página Principal</title>
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
            <li><p class="re"><a href="#" ><i class="fa-solid fa-bars"></i> Selecciona un PNF</p></li></a>
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
        <ul>
        </ul>
        
        </nav>
        <a href="nosotros.php" class="re">Nosotros</a>
        <a href="estadisticas.php" class="re">Estadistica</a>
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
    <main class="fondouni">
    <article class="todo-2">
        <h3 class="titulomain">Bienvenidos al Repositorio de la Universidad Politécnica Territorial de Yaracuy Arístides Bastidas</h3>

        <p class="parrafo">El repositorio de la UPTYAB, es un espacio donde puedes ver y descargar archivos con fines de perservacion digital, busqueda de reseña historica y formentar la actividad academica e intelectual</p>

        <p class="parrafo">Con proyectos sociotecnologicos, proyectos comunitarios, etc</p>
    </article>
    </main>

    <form action="search.php" method="post" class="barradebusqueda">
        <fieldset class="fieldset">
            <input type="text" name="buscar" id="search" placeholder="Buscar en el repositorio..." class="buscador">
            <button type="submit" name="btn" class="botondebusqueda"><i class="fa-solid fa-magnifying-glass"></i></button>
        </fieldset>
    </form>
    <section class="listarecientes">
        <h2 class="h2list">PNF</h2>
        <div class="sliderframe">
            <ul>
                <li><a href="informatica.php"><img src="../img/slider1.png" alt=""></a></li>
                <li><a href=""><img src="../img/slider2.png" alt=""></a></li>
                <li><a href=""><img src="../img/slider3.png" alt=""></a></li>
                <li><a href=""><img src="../img/slider4.png" alt=""></a></li>
                <li><a href=""><img src="../img/slider5.png" alt=""></a></li>
                <li><a href=""><img src="../img/slider6.png" alt=""></a></li>
            </ul>
        </div>
        
        <div class="proyectosre">
            <h2 class="h2list proyectosre">Proyectos recientes</h2>
            <div class="list-list">
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
            <td><a href="<?php echo $mostrar['ruta'] ?>" target="_blank">Ver</a></td>
            <td><a href="<?php echo $mostrar['ruta'] ?>" download="<?php echo $mostrar['archivo'] ?>">Descargar</a></td>
            <td><a href="edit.php?id=<?php echo $mostrar['id']?>">Editar</a></td>
            <td><a href="inhabilitar.php?id=<?php echo $mostrar['id']?>&direccion=search">Inhabilitar</a></td>
        </tr>
            <?php  } ?>
        </table>
            </div>
        </div>
    </section>
</body>
<style>
    a{
        cursor:pointer;
    }
</style>
</html>