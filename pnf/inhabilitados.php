<?php
include("../control/conexion.php");
$consulta = $conexion->query(
    "SELECT * FROM informatica 
    where estado LIKE 'Inhabilitado' 
    UNION
    SELECT * FROM administracion
    where estado LIKE 'Inhabilitado' 
    UNION
    SELECT * FROM agroalimentacion
    where estado LIKE 'Inhabilitado' 
    UNION
    SELECT * FROM avanzada
    where estado LIKE 'Inhabilitado' 
    UNION
    SELECT * FROM enfermeria
    where estado LIKE 'Inhabilitado'
    UNION
    SELECT * FROM higiene_laboral
    where estado LIKE 'Inhabilitado' 
    order by trayecto asc
");
include("../control/validacionmain.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proyectos Inhabilitados</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Urbanist:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/all.css">
    <link rel="stylesheet" href="../estilos/maincss.css">
    <link rel="icon" type="image/x-icon" href="../img/icon.png">
</head>
<body class="bodyinformatica">
<header class="logo">
        <a href="main.php"><img src="../img/logomin.png" alt="logo" width="150px" height="70px"></a>
        <nav class="dropmenu">
        <ul>
            <li><p class="re"><a><i class="fa-solid fa-bars"></i> Selecciona un PNF</p></li></a>
            <li>
        <ul class="contenido">
            <li><a href="informatica.php" class="pnf"><i class="fa-solid fa-laptop-code"></i> PNF Informática</a></li>
            <li><a href="administracion.php" class="pnf"><i class="fa-solid fa-user-tie"></i> PNF Administración</a></li>
            <li><a href="agroalimentacion.php" class="pnf"><i class="fa-solid fa-money-bill-wheat"></i> PNF Agroalimentación</a></li>
            <li><a href="enfermeria.php" class="pnf"><i class="fa-solid fa-user-nurse"></i> PNF Enfermería</a></li>
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
        <ul class="pos">
            <ul class="contenido">
            <li><a href="../control/logout.php"><i class="fa-solid fa-right-from-bracket"></i> Cerrar Sesión</a></li>
            <li><a href="configuracion.php?id=<?php echo $_SESSION['id']?>"><i class="fa-solid fa-gear"></i> Configuracion</a></li>
            <li><a href="upload.php"><i class="fa-solid fa-file-arrow-up"></i> Subir Proyectos</a></li>
            </ul>
        </ul>
        </nav>
    </header>
    <h2 class="h2informatica">Proyectos Inhabilitados</h2>
    <div class="volveredit">
        <a class="blueone" href="main.php">Volver</a>
    </div>
    <?php while($mostrar = mysqli_fetch_array($consulta)){
            ?>
                <div class="container-frames">
                    <iframe class="pdf-thumbnail" src="<?php echo $mostrar['ruta']?>" scrolling="no"></iframe>
                    <div class="flexboxp-1">
                    <p class="etiquetasproyecto"><?php echo $mostrar['etiquetas']?></p>
                    <p class="trayectoproyecto">Trayecto: <?php echo $mostrar['trayecto']?></p>
                    <p class="tipodeproyecto">Tipo: <?php echo $mostrar['tipoproyecto']?></p>
                    <hr>
                    <a class="titulodeproyecto" target="_blank" href="<?php echo $mostrar['ruta']?>"><?php echo $mostrar['titulo']?></a>

                    <div class="flexboxp-2">
                    <p class="autores">Autores: <?php echo $mostrar['autores']?></p>
                    
                    <p></p>
                    </div>
                    
                    </div>
                    
                    

                    <div class="flexboxp-3">
                    <a class="blueone1" href="habilitar.php?id=<?php echo $mostrar['id']?>&direccion=inhabilitados&idpnf=<?php echo $mostrar['idpnf']?>">Habilitar</a>
                    <a class="blueone1" href="edit.php?direccion=informatica.php&&id=<?php echo $mostrar['id']?>&&idpnf=<?php echo $mostrar['idpnf']?>">Editar</a>
                    </div>
                </div>
            <?php  } ?>
    
    
</body>
</html>