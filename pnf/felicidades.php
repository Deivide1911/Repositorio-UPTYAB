<?php 
include("../control/conexion.php");
include('../control/validacionmain.php');
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Urbanist:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/all.css">
    <link rel="stylesheet" href="../estilos/maincss.css">
    <link rel="icon" type="image/x-icon" href="../img/icon.png">
    <title>¡Carga Completada!</title>
</head>
<body class="bodyfelicidades container-felicidades">
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
        <ul>
            <ul class="contenido">
            <li><a href="../control/logout.php"><i class="fa-solid fa-right-from-bracket"></i> Cerrar Sesión</a></li>
            <li><a href="configuracion.php?id=<?php echo $_SESSION['id']?>"><i class="fa-solid fa-gear"></i> Configuracion</a></li>
            <li><a href="upload.php"><i class="fa-solid fa-file-arrow-up"></i> Subir Proyectos</a></li>
            </ul>
        </ul>
        </nav>
    </header>
    <div class="centrarfeli">
    <?php 
        if(@$_GET['pnf']){
            $pnf = $_GET['pnf'];
            $enlace = $pnf.'.php';
    ?>
    <h1 class="felicidadesh1">¡Archivo subido con éxito!</h1>
    <br>
    <a class="felicidadesa" href="<?php echo $enlace?>">Volver</a>
    <?php } else{?>
        <a href="main.php" class="felicidadesa">Volver a la página principal</a>";
    <?php } ?>
    
    </div>
    <style>
        /* NUEVO ESTILOS FELICIDADES.PHP */
.bodyfelicidades{
    margin: 0;
    box-sizing: border-box;
    overflow: hidden;
}
.container-felicidades{
    font-family: "Nunito", sans-serif;
    display: flex;
    justify-content: center;
    flex-direction: column;
    align-items: center;
    background-color: #639cd8;
    opacity: 0;
            transform: translateY(20px);
            animation: aparecer 1s forwards;
            
        }
        @keyframes aparecer {
    to {
        opacity: 1; /* Hacer visible el texto */
        transform: translateY(0); /* Regresar a la posición original */
    }
        }
.felicidadesh1{
    color: white;
    font-size: 60px;
    margin: 0;
    background-color: #0ed58d;
    width: 100%;
    display: flex;
    justify-content: center;
}
.felicidadesa{
    color: white;
    font-size: 40px;
    margin: 0;
    background-color: #0ed58d;
    padding: 10px;
    border-radius: 25px;
}
.felicidadesa:hover{
    color: #3485a6;
}

/* Fondo */
.container-felicidades {
  width: 100%;
  height: 100%;
 
  background-color: #313131;
  background-image: radial-gradient(rgba(255, 255, 255, 0.171) 2px, transparent 0);
  background-size: 30px 30px;
  background-position: -5px -5px
}

</style>
</body>
</html>