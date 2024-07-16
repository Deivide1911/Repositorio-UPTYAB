<?php
include('../control/validacionmain.php');
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
            <li><p class="re"><a href="#" ><i class="fa-solid fa-bars"></i> Selecciona un PNF</p></li>
            <li>
        <ul class="contenido">
            <li><a href="informatica.php" class="pnf"><i class="fa-solid fa-laptop-code"></i> PNF Informatica</a></li>
            <li><a href="#" class="pnf"><i class="fa-solid fa-user-tie"></i> PNF Administracion</a></li>
            <li><a href="#" class="pnf"><i class="fa-solid fa-money-bill-wheat"></i> PNF Agroalimentacion</a></li>
            <li><a href="#" class="pnf"><i class="fa-solid fa-user-nurse"></i> PNF Enfermeria</a></li>
            <li><a href="#" class="pnf"><i class="fa-solid fa-hands-bubbles"></i> PNF Higiene Laboral</a></li>
            <li><a href="#" class="pnf"><i class="fa-solid fa-building-columns"></i> PNF Avanzado</a></li>
        </ul>
        </li>
        </nav>
        <a href="#" class="re">Nosotros</a>
        <a href="#" class="re">Estadistica</a>
        <a href="../reportes/reporte.php" class="re">Reportes</a>
        <nav class="dropmenu">
        <a class="usericon"><i class="fa-solid fa-user"></i>
            Admin</a>
        <ul>
            <ul class="contenido">
                <li><a href="../control/logout.php"><i class="fa-solid fa-right-from-bracket"></i> Cerrar Sesión</a></li>
                <li><a href="#"><i class="fa-solid fa-gear"></i> Configuracion</a></li>
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
            </div>
        </div>
    </section>
</body>
</html>