<?php 
include('../control/validacionmain.php');
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nosotros</title>
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


    <h1 class="h1nosotros">Nosotros</h1>

    
    <div class="containernosotros">
        <div class="texto">
            <h2 class="titulo">Misión</h2>
            <p class="descripcion">La UPTYAB, antiguo Instituto Universitario de Tecnología del Yaracuy, tiene la misión de formar ciudadanos capacitados como Técnicos Superiores Universitarios, Licenciados e Ingenieros, altamente calificados, críticos y creativos, en áreas como Recursos Naturales Renovables, Enfermería, Administración, Procesamiento y Distribución de Alimentos, Fonoaudiología, Procesos Químicos, Informática, Higiene y Seguridad Laboral, Soberanía Alimentaria y Cultura de la alimentación.</p>
            
        </div>
        <div class="imagen">
            <img class="imagen-principal" src="../img/mision.jpg" alt="Mision">
        </div>
    </div>

    <div class="containernosotros">
        
        <div class="imagen">
            <img class="imagen-principal" src="../img/vision.jpg" alt="Mision">
        </div>

        <div class="texto">
            <h2 class="titulo">Visión</h2>
            <p class="descripcion">La UPTYAB aspira a ser una institución vinculada a las necesidades productivas, sociales y culturales de los espacios territoriales del área de influencia. Su objetivo es garantizar a la población yaracuyana acceso a la educación universitaria y dinamismo en el desarrollo endógeno de la región.</p>
            
        </div>
    </div>
    
    <div class="containernosotros">
        <h2 class="titulo">Ubicación</h2>
        <p class="descripcion">Ubicada en la Calle 19 esquina carrera 8 de Yaritagua, municipio Peña.</p>
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d412.905490825361!2d-69.12977437652977!3d10.079313992868784!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e875bcf6e888f95%3A0x2deecd5a2c6ecbc9!2sCiudad%20Universitaria!5e0!3m2!1ses-419!2sve!4v1729554198061!5m2!1ses-419!2sve" width="700" height="750" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" class="imagen-principal"></iframe>
    </div>
   

    
</body>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Delius+Swash+Caps&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap');
      /* Parte del Nosotros.php */
        .h1nosotros{
            color: black;
            background-image: url(../img/fondo.png);
            margin: auto;
            width: 100%;
            height: 100%;
            display: flex;
            justify-content: center;
            padding: 70px;
            font-family: "Delius Swash Caps", cursive;
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
        body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
}

.containernosotros {
    display: flex; /* Usar flexbox para el diseño */
    justify-content: space-between; /* Espacio entre elementos */
    align-items: center; /* Centrar verticalmente */
    padding: 20px;
}

.texto {
    flex: 1; /* Tomar la mitad del espacio disponible */
    padding-right: 20px; /* Espacio entre texto e imagen */
}

.titulo {
    font-size: 2.5em; /* Tamaño del título */
    color: #4CAF50; /* Color verde */
}

.descripcion {
    font-size: 1.2em; /* Tamaño del texto descriptivo */
    color: #333; /* Color del texto */
}

.imagen {
    flex: 1; /* Tomar la mitad del espacio disponible */
}

.imagen-principal {
    max-width: 100%; /* Hacer que la imagen sea responsiva */
    height: auto; /* Mantener la proporción de la imagen */
    border-radius: 20px;
    box-shadow: 5px 5px 5px #839496;
}
        
</style>
</html>