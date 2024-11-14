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
<body class="bodyinformatica">
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

    <form action="search.php" method="POST" class="input-container">
        <fieldset class="fieldset">
            <input type="search" placeholder="Buscar en el repositorio..." name="buscar" class="input">
            <span class="icon"> 
    <svg width="19px" height="19px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path opacity="1" d="M14 5H20" stroke="#000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> <path opacity="1" d="M14 8H17" stroke="#000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M21 11.5C21 16.75 16.75 21 11.5 21C6.25 21 2 16.75 2 11.5C2 6.25 6.25 2 11.5 2" stroke="#000" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"></path> <path opacity="1" d="M22 22L20 20" stroke="#000" stroke-width="3.5" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>
     </span>
        </fieldset>
        <div class="cont-busq">
            <select name="pnf" id="pnf" class="busq custom-select">
                <option value="a">Seleccione un PNF</option>
                <option value="informatica">Informática</option>
                <option value="administracion">Administración</option>
                <option value="agroalimentacion">Agroalimentación</option>
                <option value="enfermeria">Enfermería</option>
                <option value="higiene_laboral">Higiene & Seguridad Laboral</option>
                <option value="avanzada">Avanzada</option>
            </select>
            <select name="trayecto" id="trayecto" class="busq custom-select">
                <option value="a">Seleccione un trayecto</option>
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
            </select>
            <select name="tproyecto" id="tproyecto" class="busq custom-select">
                <option value="a">Seleccione un tipo de proyecto</option>
                <option>Sociotecnológico</option>
                <option>Comunitario</option>
            </select>
            <button type="submit" name="btn" class="searchboton"><i class="fa-solid fa-magnifying-glass"></i></button>
        </div>
        <input type="hidden" class="control" name="control" value='<?= $control?>'>
    </form>
    <div class="searchdivbarra">
        <button class="btn-act custom-select">Búsqueda Más Específica</button>
        <a href="upload.php" class="colors">Subir mi proyecto</a>
        <a href="inhabilitados.php" class="colors">Ver proyectos inhabilitados</a>
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
                    <a class="blueone2" href="inhabilitar.php?id=<?php echo $mostrar['id']?>&direccion=avanzada.php&idpnf=<?php echo $mostrar['idpnf']?>">Inhabilitar</a>
                    <a class="blueone1" href="edit.php?direccion=informatica.php&&id=<?php echo $mostrar['id']?>&&idpnf=<?php echo $mostrar['idpnf']?>">Editar</a>
                    </div>
                </div>
            <?php  } ?>
</body>
<script src="../js/search.js"></script>
<style>
    
    .searchboton{
        padding: 9px;
        border-radius: 10px;
    }

    .custom-select{
        color: #ffffff;
        background-color: #0941db;
        border: none;
        padding: 5px;
        height: auto;
        border-radius: 30px;
        justify-content: center;
        align-items: center;
        text-align: center;
        margin-top: 5px;
        margin-bottom: 5px;
        
    }
    .searchdivbarra{
        display: flex;
        justify-content: center;
        flex-direction: column;
        text-align: center;
        background-color: #327fcc;
        
    }
    .searchdivbarra a{
        color: #44e3ff;
    }
    .searchdivbarra a:hover{
        color: #2ea6ff;
    }
    .bodyinformatica{
    font-family: "Nunito", sans-serif;
    background-color: #313131;
    background-image: radial-gradient(rgba(255, 255, 255, 0.171) 2px, transparent 0);
    background-size: 30px 30px;
    background-position: -5px -5px
    }
    .h2informatica{
        color: white;
        font-size: 40px;
        margin: 0;
        background-color: #44e3ff;
        width: 100%;
        display: flex;
        justify-content: center;
    }
    .blueone1{
        color: #ffffff;
        height: 10px;
        background-color: #32bb92;
        padding: 20px;
        display: flex;
        flex-direction: row;
        border-radius: 20px;
        align-items: center;
    }
    .blueone1:hover{
        color: #186f9e;
        box-shadow: 0px 0px 8px 0px rgba(110,250,143,1);
    }
    .blueone2{
        color: #ffffff;
        height: 10px;
        background-color: #b83f3b;
        padding: 20px;
        display: flex;
        flex-direction: row;
        align-items: center;
        border-radius: 20px;
    }
    .blueone2:hover{
        color: #efc7f2;
        box-shadow: 0px 0px 8px 0px #eba7b2;
    }
    .container-frames{
        display: flex;
        padding: 8px;
        margin: 0;
        background-color: #f0f0f0;
    }

    .pdf-thumbnail { 
        width: 200px; /* Ajusta el tamaño de la miniatura */ 
        height: 250px; /* Ajusta el tamaño de la miniatura */ 
        border: none; /* Opcional: Añadir un borde */ 
        overflow: hidden; 
        pointer-events: none;
        background-color: grey;
        margin: 5px;
        }
    iframe::-webkit-scrollbar {
         display: none;
        }
    .titulodeproyecto{
        color: #0941db;
        font-size: 19px;
        margin: 0px;
        text-decoration: double;
    }
    .autores{
        color: grey;
        margin: 10px;
        font-size: 16px;
        display: inline;
        
    }
    .etiquetasproyecto{
        color: white;
        background-color: #327fcc;
        border-radius: 15px;
        display: flex;
        margin: 0px 0px 0px 0;
        padding: 5px;
        font-size: 12px;
        margin-bottom: 5px;
        margin-left: 0px;
        margin-right: 680px;
    }
    .trayectoproyecto{
        color: white;
        background-color: #a788e5;
        border-radius: 15px;
        display: flex;
        margin: 0px 0px 0px 0;
        padding: 5px;
        font-size: 12px;
        margin-bottom: 5px;
        margin-left: 0px;
        margin-right: 700px;
        
    }
    .tipodeproyecto{
        color: white;
        background-color: #a2b4ea;
        border-radius: 15px;
        display: flex;
        margin: 0px 0px 0px 0;
        padding: 5px;
        font-size: 12px;
        margin-bottom: 5px;
        margin-left: 0px;
        margin-right: 700px;
        
    }
    .flexboxp-1{
        width: 70%;
        margin-left: 15px;
        
    }
    .flexboxp-2{
        flex-direction: column;
    }
    .flexboxp-3{
        display: flex;
        margin: 15px;
    }
</style>
</html>
