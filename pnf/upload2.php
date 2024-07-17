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
<body class="uploadbody">
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
        <a href="#" class="re">Relleno</a>
        <nav class="dropmenu">
        <a class="usericon"><i class="fa-solid fa-user"></i>
            Admin</a>
        <ul>
            <ul class="contenido">
                <li><a href="../control/logout.php"><i class="fa-solid fa-right-from-bracket"></i> Cerrar Sesión</a></li>
                <li><a href="#"><i class="fa-solid fa-gear"></i> Configuracion</a></li>
                <li><a href="upload.html"><i class="fa-solid fa-file-arrow-up"></i> Subir Proyectos</a></li>
            </ul>
        </ul>
        </nav>
    </header>

    <form class="upload" method="post" enctype="multipart/form-data">
        <h2>Formulario</h2>
        <p>Título</p>
    <input type="text" name="titulo" placeholder="Ingrese el título del proyecto" required>
    <label for="pnfselect">PNF</label> 
    <select id="pnfselect" name="pnf" required> 
        <option value="informatica">Informática</option>
        <option value="agroalimentacion">Agroalimentación</option>
        <option value="enfermeria">Enfermería</option>
        <option value="administracion">Administración</option>
        <option value="higiene laboral">Higiene Laboral</option>
        <option value="avanzado">Avanzado</option>
    </select>

        <label>Tipo de Proyecto</label>
        <select name="tipoproyecto" id="tipoproyecto">
            <option>Sociotecnologico</option>
            <option>Comunitario</option>
        </select>

        <div class="archivopdf">
            <label for="file">Seleccione su documento (PDF)</label>
            <input type="file" id="document" name="file" accept=".pdf">
        </div>
        <label for="etiquetas">Etiquetas de su proyecto Ej. #Ambiental</label>
        <input type="text" placeholder="Ingrese etiquetas para encontrar facilmente su proyecto" name="etiquetas">
        <label for="autores">Ingrese por favor los autores de este proyecto</label>
        <input type="text" placeholder="Autores" name="autores">
        <br>
        <label for="trayecto">Seleccione su trayecto</label>
        <select name="trayecto" id="trayecto">
            <option>1</option>
            <option >2</option>
            <option>3</option>
            <option>4</option>
        </select>
        <br>
        <input type="submit" name="btn">
    </form>
    <?php
        include("upload2().php");
    ?>
</body>
</html>
