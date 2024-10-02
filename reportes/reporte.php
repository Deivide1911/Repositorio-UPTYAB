<?php 
include("../control/conexion.php");
include('../control/validacionmain.php');
if(isset($_POST['busq'])){
    if(isset($_POST['mes']) && isset($_POST['dia'])){
        $mes = $_POST['mes'];
        $dia = $_POST['dia'];
        $año = date('Y'); 
        if($mes != 'a' && $dia != 'a'){
        $consulta = $conexion->query("SELECT * FROM entradas WHERE MONTH(fecha) = '$mes' AND DAY(fecha) = '$dia' AND YEAR(fecha) = '$año'");
        }
        else if($mes != 'a' && $dia == 'a'){
        $consulta = $conexion->query("SELECT * FROM entradas WHERE MONTH(fecha) = '$mes' AND YEAR(fecha) = '$año'");
        }
        else{
            echo "Se deben completar los campos para realizar la búsqueda correctamente";
            $consulta = $conexion->query("SELECT * FROM entradas order by idunic desc");
        }
    }
    else if(isset($_POST['mes'])){
        $mes = $_POST['mes'];
        $año = date('Y'); 
        $consulta = $conexion->query("SELECT * FROM entradas WHERE MONTH(fecha) = '$mes' AND YEAR(fecha) = '$año'");
    }
    else{
        $consulta = $conexion->query("SELECT * FROM entradas order by idunic desc");
    }
}
else{
$consulta = $conexion->query("SELECT * FROM entradas order by idunic desc");
}
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
            <li><p class="re"><a><i class="fa-solid fa-bars"></i> Selecciona un PNF</p></li></a>
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
        <a href="reporte.php" class="re">Reportes</a>
        <nav class="dropmenu cerrarsesion">
        <a class="usericon"><i class="fa-solid fa-user"></i>
            Admin</a>
        <ul>
            <ul class="contenido">
            <li><a href="../control/logout.php"><i class="fa-solid fa-right-from-bracket"></i> Cerrar Sesión</a></li>
            <li><a href="../pnf/configuracion.php?id=<?php echo $_SESSION['id']?>"><i class="fa-solid fa-gear"></i> Configuracion</a></li>
            <li><a href="../pnf/upload.php"><i class="fa-solid fa-file-arrow-up"></i> Subir Proyectos</a></li>
            </ul>
        </ul>
        </nav>
    </header>
    <form action="reporte.php" method="POST">
        <div class="cont-busq-act">
                <select name="mes" id="mes" class="filtro-reportes" onchange="actualizarDias()">
                    <option value="a">Buscar por mes</option>
                    <option value="1">Enero</option>
                    <option value="2">Febrero</option>
                    <option value="3">Marzo</option>
                    <option value="4">Abril</option>
                    <option value="5">Mayo</option>
                    <option value="6">Junio</option>
                    <option value="7">Julio</option>
                    <option value="8">Agosto</option>
                    <option value="9">Septiembre</option>
                    <option value="10">Octubre</option>
                    <option value="11">Noviembre</option>
                    <option value="12">Diciembre</option>
                </select>
                <select name="dia" id="dia" class="filtro-reportes">
                    <option value="a">Seleccione su día</option>
                </select>
                <input type="hidden" value="1" name="busq">
                <button type="submit" name="btn" class="botondebusqueda"><i class="fa-solid fa-magnifying-glass"></i></button>
            </div>
    </form>

    <div class="back">
        <a href="../pnf/main.php" class="reportvolver">Volver</a>
    </div>
    <?php 
        while($mostrar = mysqli_fetch_array($consulta)){
    ?>
    <p class="report"> <?php echo "El usuario ",$mostrar['nombre']," ",$mostrar['apellido']," (",$mostrar['id'],")"," ha ingresado el ",date('d',strtotime($mostrar['fecha'])),"-",date('m',strtotime($mostrar['fecha'])),"-",date('Y',strtotime($mostrar['fecha']))," a las ",$mostrar['hora']?></p>
    <?php 
        }
    ?>
    
</body>
<script src="../js/reportes.js"></script>
</html>