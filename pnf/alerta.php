<?php 
include("../control/conexion.php");
include("../control/validacionmain.php");
if(@$_GET['pnf'] && @$_GET['titulo'] && @$_GET['archivo']){
    $pnf = $_GET['pnf'];
    $titulo = $_GET['titulo'];
    $archivo = $_GET['archivo'];
    $consulta = $conexion->query("SELECT * from $pnf where titulo = '$titulo' or archivo = '$archivo'");
    $consulta2 = $conexion->query("SELECT * from $pnf where titulo = '$titulo' and archivo = '$archivo'");
    $consulta3 =$conexion->query("SELECT * from $pnf where archivo = '$archivo'");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alerta de plagio!</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Urbanist:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/all.css">
    <link rel="stylesheet" href="../estilos/maincss.css">
    <link rel="icon" type="image/x-icon" href="../img/icon.png">
</head>
<body class="alertafondo">
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
    <section class="alertaanimacion">
    <h1 class="alertah1">¡Alerta de plagio!</h1>
    <br>
    <?php 
        if($consulta2->fetch_object()){
            echo "<h2 class=\"h2alerta\">Su título y su nombre de archivo coinciden con los siguientes proyectos:</h2>";
        }
        else if($consulta3->fetch_object()){
            echo "<h2 class=\"h2alerta\">¡Ups! su nombre de archivo coincide con los siguientes proyectos:</h2>";
        }
        else{
            echo "<h2 class=\"h2alerta\">¡Ups! su título coincide con los siguientes proyectos:</h2>";
        }
    ?>
    </section>
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
                    <a class="blueone2" href="inhabilitar.php?id=<?php echo $mostrar['id']?>&direccion=enfermeria.php&idpnf=<?php echo $mostrar['idpnf']?>">Inhabilitar</a>
                    <a class="blueone1" href="edit.php?direccion=informatica.php&&id=<?php echo $mostrar['id']?>&&idpnf=<?php echo $mostrar['idpnf']?>">Editar</a>
                    </div>
                </div>
            <?php  } ?>
    <section class="alertaanimacion"> 
    <label class="alertalabel">¿Desea subir el proyecto? Haga click<a class="alertaetiqueta2" href="upload2.php"> Aquí</a></label> 
    <br>
    <a href="upload.php" class="alertaetiqueta">Volver</a>
    </section>
</body>

<style>
.alertaanimacion{
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

.alertafondo{
    background-color: #313131;
    background-image: radial-gradient(rgba(255, 255, 255, 0.171) 2px, transparent 0);
    background-size: 30px 30px;
    background-position: -5px -5px;
    font-family: "Nunito", sans-serif;
    
}
.alertah1{
    color: #fefeff;
    font-size: 60px;
    background-color: #d75e5c;
    display: flex;
    margin: 0;
    width: 100%;
    justify-content: center;
    
}
.alertaetiqueta{
    color: #addaeb;
    font-size: 20px;
    margin: 0px 600px 600px;
    border-radius: 20px;
    display: flex;
    justify-content: center;
    background-color: #3381ca;
    padding: 10px;
}
.alertaetiqueta2{
    color: #45d149;
    margin-left: 5px;
    display: flex;
    justify-content: center;
}
.h2alerta{
    color: #f2fcfb;
    margin: 0;
    display: flex;
    background-color: #313131;
    justify-content: center;
}
.alertalabel{
    background-color: #fefeff;
    margin: 0;
    display: flex;
    width: 100%;
    padding: 10px;

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
<?php 
} else{
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perdida de datos</title>
</head>
<body>
    <h1>Se han perdido los datos, vuelve a subir tu archivo</h1>
    <a href="upload.php">Volver</a>
</body>


</html>
<?php 
}
?>