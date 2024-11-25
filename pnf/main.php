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
<body class="bodymainanimacion">
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
            <li><a href="list_users.php" class="pnf"><i class="fa-solid fa-building-columns"></i>Lista de usuarios</a></li>
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
            <li><a href="configuracion.php?id=<?php echo $_SESSION['id']?>"><i class="fa-solid fa-gear"></i> Configuración</a></li>
            <li><a href="upload.php"><i class="fa-solid fa-file-arrow-up"></i> Subir Proyectos</a></li>
            </ul>
        </ul>
        </nav>
    </header>
    <main class="container">
    <article class="todo-2">
        <h3 class="titulomain">Bienvenidos al Repositorio de la Universidad Politécnica Territorial de Yaracuy Arístides Bastidas</h3>

        <p class="parrafo">El repositorio de la UPTYAB, es un espacio donde puedes ver y descargar archivos con fines de preservación digital, búsqueda de reseña histórica y fomentar la actividad académica e intelectual</p>

        <p class="parrafo">Con proyectos socio tecnológicos, proyectos comunitarios, etc.</p>
    </article>
    </main>

    <section class="listarecientes">
        <h2 class="h2list">PNF</h2>
        <div class="sliderframe">
            <ul>
                <li><a href="informatica.php"><img src="../img/slider1.png" alt="Informática"></a></li>
                <li><a href="administracion.php"><img src="../img/slider2.png" alt="Administración"></a></li>
                <li><a href="agroalimentacion.php"><img src="../img/slider3.png" alt="Agroalimentación"></a></li>
                <li><a href="enfermeria.php"><img src="../img/slider4.png" alt="Enfermería"></a></li>
                <li><a href="higiene_laboral.php"><img src="../img/slider5.png" alt="Higiene & Seguridad Laboral"></a></li>
                <li><a href="avanzada.php"><img src="../img/slider6.png" alt="Avanzada"></a></li>
            </ul>
        </div>

    <form action="search.php" method="POST" class="searchfondo">
    <div class="input-container">
    <input type="text" name="text" class="input" placeholder="Busca tu proyecto">
    <span class="icon"> 
    <svg width="19px" height="19px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path opacity="1" d="M14 5H20" stroke="#000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> <path opacity="1" d="M14 8H17" stroke="#000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M21 11.5C21 16.75 16.75 21 11.5 21C6.25 21 2 16.75 2 11.5C2 6.25 6.25 2 11.5 2" stroke="#000" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"></path> <path opacity="1" d="M22 22L20 20" stroke="#000" stroke-width="3.5" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>
     </span>
     </form>
    </div>
    <h2 class="h2informatica">Proyectos Recientes</h2>
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
                    <a class="blueone2" href="inhabilitar.php?id=<?php echo $mostrar['id']?>&direccion=main.php&idpnf=<?php echo $mostrar['idpnf']?>">Inhabilitar</a>
                    <a class="blueone1" href="edit.php?direccion=informatica.php&&id=<?php echo $mostrar['id']?>&&idpnf=<?php echo $mostrar['idpnf']?>">Editar</a>
                    </div>
                </div>
            <?php  } ?>
</html>