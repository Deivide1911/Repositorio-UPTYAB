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
    <link rel="stylesheet" href="../estilos(nuevo index)/main.css">
</head>
<body>
    <header>
        <a href="index.php"><img src="../images (nuevo index)/logomin.png" alt="logo" class="logo-uptyab"></a>
        <div class="logo">REPOSITORIO UPTYAB</div>
        <nav>
            <ul class="nav-list">
                <li><a href="">PNF</a></li>
                <li><a href="">Nosotros</a></li>
                <li><a href="">Estadisticas</a></li>
                <li><a href="">Reportes</a></li>
            </ul>

            <ul>
            <ul class="contenido">
            <li><a href="../control/logout.php"><i class="fa-solid fa-right-from-bracket"></i> Cerrar Sesión</a></li>
            <li><a href="configuracion.php?id=<?php echo $_SESSION['id']?>"><i class="fa-solid fa-gear"></i> Configuracion</a></li>
            <li><a href="upload.php"><i class="fa-solid fa-file-arrow-up"></i> Subir Proyectos</a></li>
            </ul>
        </ul>
        </nav>
    </header>

    <main class="fondouni">
        
        <article class="todo-2">
            <h2 class="titulomain">Bienvenidos al Repositorio de la Universidad Politécnica Territorial de Yaracuy Arístides Bastidas</h3>
        
            <p class="parrafo">El repositorio de la UPTYAB, es un espacio donde puedes ver y descargar archivos con fines de perservacion digital, busqueda de reseña historica y formentar la actividad academica e intelectual</p>
        
            <p class="parrafo">Con proyectos sociotecnologicos, proyectos comunitarios, etc</p>
        </article>
           

    </main>

    <div class="slider-container">
        <div class="slider position"></div>
    </div>
</body>
</html>