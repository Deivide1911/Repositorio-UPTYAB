<?php 
include("../control/conexion.php");
$consulta = $conexion->query("SELECT * FROM entradas order by idunic desc");
include('../control/validacionmain.php');
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reportes</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Urbanist:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/all.css">
    <link rel="stylesheet" href="../estilos/maincss.css">
    <link rel="icon" type="image/x-icon" href="../img/icon.png">
</head>
<body>


<header class="logo">
        <a href="../pnf/main.php"><img src="../img/logomin.png" alt="logo" width="150px" height="70px"></a>
        <nav class="dropmenu">
        <ul>
            <li><p class="re"><a href="#" ><i class="fa-solid fa-bars"></i> Selecciona un PNF</p></li></a>
            <li>
        <ul class="contenido">
            <li><a href="../pnf/informatica.php" class="pnf"><i class="fa-solid fa-laptop-code"></i> PNF Informatica</a></li>
            <li><a href="../pnf/administracion.php" class="pnf"><i class="fa-solid fa-user-tie"></i> PNF Administracion</a></li>
            <li><a href="../pnf/agroalimentacion.php" class="pnf"><i class="fa-solid fa-money-bill-wheat"></i> PNF Agroalimentacion</a></li>
            <li><a href="../pnf/enfermeria.php" class="pnf"><i class="fa-solid fa-user-nurse"></i> PNF Enfermeria</a></li>
            <li><a href="../pnf/higiene_laboral.php" class="pnf"><i class="fa-solid fa-hands-bubbles"></i> PNF Higiene & Seguridad Laboral</a></li>
            <li><a href="../pnf/avanzada.php" class="pnf"><i class="fa-solid fa-building-columns"></i> PNF Avanzado</a></li>
        </ul>
        </li>
        <ul>
        </ul>
        
        </nav>
        <a href="../pnf/nosotros.php" class="re">Nosotros</a>
        <a href="../pnf/estadisticas.php" class="re">Estadistica</a>
        <a href="reporte.php" class="re">Reportes</a>
        <nav class="dropmenu cerrarsesion">
        <a class="usericon"><i class="fa-solid fa-user"></i>
            Admin</a>
        <ul>
            <ul class="contenido">
            <li><a href="../control/logout.php"><i class="fa-solid fa-right-from-bracket"></i> Cerrar Sesión</a></li>
            <li><a href="../pnf/configuracion.php"><i class="fa-solid fa-gear"></i> Configuracion</a></li>
            <li><a href="../pnf/upload.php"><i class="fa-solid fa-file-arrow-up"></i> Subir Proyectos</a></li>
            </ul>
        </ul>
        </nav>
    </header>



    <a href="../pnf/main.php" class="reportvolver">Volver</a>
    <?php 
        while($mostrar = mysqli_fetch_array($consulta)){
    ?>
    <p class="report"> <?php echo "El usuario ",$mostrar['nombre']," ",$mostrar['apellido']," (",$mostrar['id'],")"," ha ingresado el ",date('d',strtotime($mostrar['fecha'])),"-",date('m',strtotime($mostrar['fecha'])),"-",date('Y',strtotime($mostrar['fecha']))," a las ",$mostrar['hora']?></p>
    <?php 
        }
    ?>
    
</body>
<style>
    .reportvolver{
    color: #e7e1e1;
    margin: auto;
    display: flex;
    justify-content: center;
    background-color: #4954b9;
    width: 100%;
    font-family: "Urbanist", sans-serif;
    font-size: 25px;
    }
    .report{
    font-family: "Urbanist", sans-serif;
    display: flex;
    justify-content: center;
    padding: 5px;
    border-bottom: 1px solid #4954b9;
    }
</style>
</html>