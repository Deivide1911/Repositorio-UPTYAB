<?php 
include("../control/conexion.php");
include('../control/validacionmain.php');
include("../control/reporteControl.php");
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.min.js"></script>
</head>
<body class="bodyreportes">
<header class="logo">
        <a href="../pnf/main.php"><img src="../img/logomin.png" alt="logo" width="150px" height="70px"></a>
        <nav class="dropmenu">
        <ul>
            <li><p class="re"><a><i class="fa-solid fa-bars"></i> Selecciona un PNF</p></li></a>
            <li>
        <ul class="contenido">
            <li><a href="../pnf/informatica.php" class="pnf"><i class="fa-solid fa-laptop-code"></i> PNF Informática</a></li>
            <li><a href="../pnf/administracion.php" class="pnf"><i class="fa-solid fa-user-tie"></i> PNF Administración</a></li>
            <li><a href="../pnf/agroalimentacion.php" class="pnf"><i class="fa-solid fa-money-bill-wheat"></i> PNF Agroalimentación</a></li>
            <li><a href="../pnf/enfermeria.php" class="pnf"><i class="fa-solid fa-user-nurse"></i> PNF Enfermería</a></li>
            <li><a href="../pnf/higiene_laboral.php" class="pnf"><i class="fa-solid fa-hands-bubbles"></i> PNF Higiene & Seguridad Laboral</a></li>
            <li><a href="../pnf/avanzada.php" class="pnf"><i class="fa-solid fa-building-columns"></i> PNF Avanzado</a></li>
        </ul>
        </li>
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
    <form action="reporte.php" method="POST" class="form-act">
        <div class="cont-busq-act">
                <select name="mes" id="mes" class="custom-select" onchange="actualizarDias()">
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
                <select name="dia" id="dia" class="custom-select">
                    <option value="a">Seleccione su día</option>
                </select>
                <input type="hidden" value="1" name="busq">
                <input type="hidden" value="<?=$control?>" name="control" class="control">
                <button type="submit" name="btn" class="searchboton"><i class="fa-solid fa-magnifying-glass"></i></button>
            </div>
    </form>
    <form action="reporte.php" method="POST" class="form-desac">
            <div class="cont-reporte">
                <div class="container-fechainicioyfinal">
                   <label for="fecha_inicio">Fecha inicio:</label>
                   <input type="date" name="fecha_inicio" id="fecha_inicio" class="input-fechainicioyfinal" required>
                </div>
            <p>Hasta: </p>
                <div class="container-fechainicioyfinal">
                    <label for="fecha_final">Fecha final:</label>
                    <input type="date" name="fecha_final" id="fecha_final" class="input-fechainicioyfinal" required>
                </div>
                <button type="submit" name="btn" class="searchboton"><i class="fa-solid fa-magnifying-glass"></i></button>
            </div>
            <input type="hidden" value="1" name="busq">
            <input type="hidden" value="<?=$control?>" name="control" class="control">
    </form>
    
    <div class="div-center">
        <button class="btn-act">Cambiar modo de búsqueda</button>
        <button class="btn-act" id="btn" onclick="generarPDF()">Descargar PDF</button>
    </div>
    <div class="back">
        <a href="../pnf/main.php" class="reportvolver">Volver</a>
    </div>
    
        <?php 
        // Validando si se consiguieron resultados
        if($consulta ->num_rows > 0){
        ?>
        <div class="table-container">
        <table class="styled-table" id="contenido">
        <thead>
        <tr>
            <th>Número</th>
            <th>CI</th>
            <th>Nombre y Apellido</th>
            <th>Fecha</th>
            <th>Hora Entrada</th>
            <th>Hora Salida</th>
        </tr>
        </thead>
        <?php 
        // Ciclo while para el array va a crear lo que contenga
        while($mostrar = mysqli_fetch_array($consulta)){
        ?>
        <tbody>
        <tr>
            <td><?php echo $mostrar['idunic'] ?></td>
            <td><?php echo $mostrar['id'] ?></td>
            <td><?php echo $mostrar['nombre']." ".$mostrar['apellido']?></td>
            <td><?php echo date('d-m-Y',strtotime($mostrar['fecha'])) ?></td>
            <td><?php echo $mostrar['hora'] ?></td>
            <td><?= $mostrar['hora_salida'] == '' ? 'En línea' : $mostrar['hora_salida']?></td>
        </tr>
        </tbody>
    <?php 
        }
    ?>
    </table>
    </div>
    
    <?php
        // De lo contrario hacer lo siguiente:
        }
    else{
    ?>
    <p class="report">No se encontraron resultados</p>
    <?php 
    }
    ?>
</body>
<script src="../js/reportes.js"></script>
<script src="../js/busquedaReportes.js"></script>
<script src="../js/generarPDF.js"></script>
<style>
    /* DISEÑO NUEVO */
    .bodyreportes{
        font-family: "Nunito", sans-serif;
        background-color: #313131;
        background-image: radial-gradient(rgba(255, 255, 255, 0.171) 2px, transparent 0);
        background-size: 30px 30px;
        background-position: -5px -5px;
        color: #ffffff;
        
    }
    .container-fechainicioyfinal{
        display: flex;
        
    }
    .input-fechainicioyfinal{
        background-color: #0941db;
        color: #ffffff;
        border: none;
        border-radius: 20px;
        padding: 5px;
        margin-top: 5px;
        margin-bottom: 5px;
    }
    .searchboton{
        padding: 9px;
        border-radius: 10px;
    }
    .btn-act{
        color: #ffffff;
        background-color: #0941db;
        border: none;
        padding: 5px;
        height: auto;
        border-radius: 30px;
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
    /* Nuevas tablas */
    
    .styled-table {
    border-collapse: collapse;
    width: 100%;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    color: #313131;
    background-color: #ffffff;
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

    .styled-table thead tr {
    background-color: #4CAF50;
    color: #ffffff;
}

    .styled-table th, .styled-table td {
    padding: 12px 15px;
    text-align: left;
}

    .styled-table tbody tr {
    border-bottom: 1px solid #dddddd;
}

    .styled-table tbody tr:nth-of-type(even) {
    background-color: #f3f3f3; /* Color de fondo para filas pares */
}

    .styled-table tbody tr:hover {
    background-color: #d1e7dd; /* Color de fondo al pasar el mouse */
}
</style>
</html>
