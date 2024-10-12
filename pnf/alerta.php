<?php 
include("../control/conexion.php");
if(@$_GET['pnf'] && @$_GET['titulo'] && @$_GET['archivo']){
    $pnf = $_GET['pnf'];
    $titulo = $_GET['titulo'];
    $archivo = $_GET['archivo'];
    $consulta = $conexion->query("SELECT * from $pnf where titulo = '$titulo' or archivo = '$archivo'");
    $consulta2 = $conexion->query("SELECT * from $pnf where titulo = '$titulo' and archivo = '$archivo'");
    $consulta3 =$conexion->query("SELECT * from $pnf where archivo = '$archivo'");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alerta de plagio!</title>
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
    <h1>Alerta de plagio!</h1>
    <br>
    <?php 
        if($consulta2->fetch_object()){
            echo "<h2>Su título y su nombre de archivo coinciden con los siguientes proyectos:</h2>";
        }
        else if($consulta3->fetch_object()){
            echo "<h2>Ups! su nombre de archivo coincide con los siguientes proyectos:</h2>";
        }
        else{
            echo "<h2>Ups! su título coincide con los siguientes proyectos:</h2>";
        }
    ?>
    <table class="tablasearch">
        <tr>
            <th>Titulo</th>
            <th>Trayecto</th>
            <th>Tipo de proyecto</th>
            <th>Autores</th>
            <th>Etiquetas</th>
            <th>Nombre del archivo</th>
            <th>Estado</th>
        </tr>
    <?php 
        while($mostrar = mysqli_fetch_array($consulta)){
    ?>
    <tr>
        <td><?php echo $mostrar['titulo'] ?></td>
        <td><?php echo $mostrar['trayecto'] ?></td>
        <td><?php echo $mostrar['tipoproyecto'] ?></td>
        <td><?php echo $mostrar['autores'] ?></td>
        <td><?php echo $mostrar['etiquetas'] ?></td>
        <td><?php echo $mostrar['archivo'] ?></td>
        <td><?php echo $mostrar['estado'] ?></td>
        <td><a class="blueone" href="<?php echo $mostrar['ruta'] ?>" target="_blank">Ver</a></td>
        <td><a class="blueone" href="<?php echo $mostrar['ruta'] ?>" download="<?php echo $mostrar['archivo'] ?>">Descargar</a></td>
        <td><a class="blueone" href="edit.php?id=<?php echo $mostrar['id']?>">Editar</a></td>
    </tr>
    <?php 
     }
    ?>
    </table>
    <label>¿Desea subir el proyecto? haga click <a class="blueone" href="upload2.php"> aquí</a></label> 
    <br>
    <a href="upload.php">Volver</a>
</body>
</html>
<?php 
} else{
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perdida de datos</title>
</head>
<body>
    <h1>Se han perdido los datos, vuelve a subir tu archivo</h1>
    <a href="upload.php">Volver</a>
</body>
</html>
<?php 
}
?>