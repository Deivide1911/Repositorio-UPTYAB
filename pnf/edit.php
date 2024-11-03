<?php 
include("./controladores(admin)/edit(mostrar edit).php");
include('../control/validacionmain.php');
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar</title>
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
            <li><a href="informatica.php" class="pnf"><i class="fa-solid fa-laptop-code"></i> PNF Informática</a></li>
            <li><a href="administracion.php" class="pnf"><i class="fa-solid fa-user-tie"></i> PNF Administración</a></li>
            <li><a href="agroalimentacion.php" class="pnf"><i class="fa-solid fa-money-bill-wheat"></i> PNF Agroalimentación</a></li>
            <li><a href="enfermeria.php" class="pnf"><i class="fa-solid fa-user-nurse"></i> PNF Enfermería</a></li>
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
    <div class="divcenternew">
        <form action="./controladores(admin)/edit_consulta.php" method ="post" class="uploadnew">
            <label for="titulo">Titulo</label>
            <input type="text" placeholder="Título" value="<?=$titulo?>" id="titulo" name="titulo" class="inputnew">
            <br>
            <label for="trayecto">Trayecto</label>
            <select name="trayecto">
                <option value="1" <?= $trayecto == 1 ? 'selected' : '' ?>>1</option>
                <option value="2" <?= $trayecto == 2 ? 'selected' : '' ?>>2</option>
                <option value="3" <?= $trayecto == 3 ? 'selected' : '' ?>>3</option>
                <option value="4" <?= $trayecto == 4 ? 'selected' : '' ?>>4</option>
            </select>
            <br>
            <label for="tipo de proyecto">Tipo de proyecto</label>
            <select name="tipoproyecto" value="<?=$tipoproyecto?>">
                <option value="Sociotecnológico" <?= $tipoproyecto == 'Sociotecnológico' ? 'selected' : '' ?>>Sociotecnológico</option>
                <option value="Comunitario" <?= $tipoproyecto == 'Comunitario' ? 'selected' : '' ?>>Comunitario</option>
            </select>
            <input type="hidden" name="direccion" value="<?=$direccion?>">
            <br>
            <label for="autores">Autores</label>
            <input type="text" placeholder="Autores" value="<?=$autores?>"id="autores" name="autores" class="inputnew">
            <br>
            <label for="etiquetas">Etiquetas</label>
            <input type="text" placeholder="Etiquetas" value="<?=$etiquetas?>" id="etiquetas" name="etiquetas" class="inputnew">
            <input type="hidden" value=<?=$id?> name="id">
            <input type="hidden" value=<?=$pnf?> name="pnf">
            <br>
            <input type="submit" name="btn" class="btnnew">
        </form>
    </div>
    <div class="div-center">
        <a class="blueone margin-edit" href="<?php echo $direccion ?>">Volver</a>
    </div>
</body>
<style>
    .inputnew{
        width:350px;
    }
    .divcenternew{
        width:100%;
        display:flex;
        justify-content:center;
        align-items:center;
    }
    .btnnew{
        width:75px;
        height:35px;
        margin-top:10px;
        margin-bottom:10px;
    }
    .uploadnew{
        display:flex;
        justify-content:center;
        align-items:center;
        flex-direction:column;
        margin-top:20px;
        width:400px;
        height:500px;
    }
</style>
</html>