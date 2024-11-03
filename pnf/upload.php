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
<body class="containerupload">

<header class="logo">
        <a href="main.php"><img src="../img/logomin.png" alt="logo" width="150px" height="70px"></a>
        <nav class="dropmenu">
        <ul>
            <li><p class="re"><a><i class="fa-solid fa-bars"></i> Selecciona un PNF</p></li>
            <li>
        <ul class="contenido">
            <li><a href="informatica.php" class="pnf"><i class="fa-solid fa-laptop-code"></i> PNF Informatica</a></li>
            <li><a href="administracion.php" class="pnf"><i class="fa-solid fa-user-tie"></i> PNF Administracion</a></li>
            <li><a href="agroalimentacion.php" class="pnf"><i class="fa-solid fa-money-bill-wheat"></i> PNF Agroalimentacion</a></li>
            <li><a href="enfermeria.php" class="pnf"><i class="fa-solid fa-user-nurse"></i> PNF Enfermeria</a></li>
            <li><a href="higiene.php" class="pnf"><i class="fa-solid fa-hands-bubbles"></i> PNF Higiene Laboral</a></li>
            <li><a href="avanzada.php" class="pnf"><i class="fa-solid fa-building-columns"></i> PNF Avanzada</a></li>
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

    <div class="upload-form-container">
    <form class="upload-form" method="post" enctype="multipart/form-data">
        <h2 class="uplo">Formulario</h2>

        <div class="upload-input-group">
        <label for="titulo">Título</label>
        <input type="text" name="titulo" placeholder="Ingrese el título del proyecto" required>
        </div>

        <div class="upload-input-group">
        <label for="pnfselect">PNF</label> 
            <select id="pnfselect" name="pnf" required> 
                <option value="informatica">Informática</option>
                <option value="agroalimentacion">Agroalimentación</option>
                <option value="enfermeria">Enfermería</option>
                <option value="administracion">Administración</option>
                <option value="higiene_laboral">Higiene Laboral</option>
                <option value="avanzada">Avanzada</option>
            </select>
        </div>
        
        <div class="upload-input-group"> 
            <label>Tipo de Proyecto</label>
                <select name="tipoproyecto" id="tipoproyecto">
                    <option>Sociotecnológico</option>
                    <option>Comunitario</option>
                </select>
        </div>

            <div class="">
                <label for="file">Seleccione su documento (PDF)</label>
                <input type="file" id="document" name="file" accept=".pdf">
            </div>
            
            <?php
                include("./controladores(admin)/upload().php");
            ?>
            <label for="etiquetas">Etiquetas de su proyecto Ej. #Ambiental</label>
                <input type="text" placeholder="Ingrese etiquetas para encontrar facilmente su proyecto" name="etiquetas">
            <label for="autores">Ingrese por favor los autores de este proyecto</label>
                <input type="text" placeholder="Autores" name="autores">
            <br>
            <label for="trayecto">Seleccione su trayecto</label>
                <select name="trayecto" id="trayecto">
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                </select>
            <br>
            <input type="submit" name="btn" class="upload-sign ">
    </form>
    </div>
    
</body>
<style>
    /* NUEVOS ESTILOS UPLOAD.PHP */
.containerupload {
  width: 100%;
  height: 100%;
 
  background-color: #313131;
  background-image: radial-gradient(rgba(255, 255, 255, 0.171) 2px, transparent 0);
  background-size: 30px 30px;
  background-position: -5px -5px;
  font-family: "Nunito", sans-serif;
}
/* NUEVO FROM */
.upload-form-container {
  width: 620px;
  border-radius: 0.75rem;
  background-color: rgba(17, 24, 39, 1);
  padding: 2rem;
  color: rgba(243, 244, 246, 1);
  margin: auto;
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



.upload-title {
  text-align: center;
  font-size: 1.5rem;
  line-height: 2rem;
  font-weight: 700;
}

.upload-form {
  margin-top: 1.5rem;
}

.upload-input-group {
  margin-top: 0.25rem;
  font-size: 0.875rem;
  line-height: 1.25rem;
}

.upload-input-group label {
  display: block;
  color: rgba(156, 163, 175, 1);
  margin-bottom: 4px;
}

.upload-input-group input {
  width: 100%;
  border-radius: 0.375rem;
  border: 1px solid rgba(55, 65, 81, 1);
  outline: 0;
  background-color: rgba(17, 24, 39, 1);
  padding: 0.75rem 1rem;
  color: rgba(243, 244, 246, 1);
}

.upload-input-group input:focus {
  border-color: rgba(167, 139, 250);
}

.upload-forgot {
  display: flex;
  justify-content: flex-end;
  font-size: 0.75rem;
  line-height: 1rem;
  color: rgba(156, 163, 175,1);
  margin: 8px 0 14px 0;
}

.upload-forgot a,.upload-signup a {
  color: rgba(243, 244, 246, 1);
  text-decoration: none;
  font-size: 14px;
}

.upload-forgot a:hover, .upload-signup a:hover {
  text-decoration: underline rgba(167, 139, 250, 1);
}

.upload-sign {
  display: block;
  width: 100%;
  background-color: rgba(167, 139, 250, 1);
  padding: 0.75rem;
  text-align: center;
  color: rgba(17, 24, 39, 1);
  border: none;
  border-radius: 0.375rem;
  font-weight: 600;
}

.upload-social-message {
  display: flex;
  align-items: center;
  padding-top: 1rem;
}

.upload-line {
  height: 1px;
  flex: 1 1 0%;
  background-color: rgba(55, 65, 81, 1);
}

.upload-social-message .message {
  padding-left: 0.75rem;
  padding-right: 0.75rem;
  font-size: 0.875rem;
  line-height: 1.25rem;
  color: rgba(156, 163, 175, 1);
}

.upload-social-icons {
  display: flex;
  justify-content: center;
}

.upload-social-icons .icon {
  border-radius: 0.125rem;
  padding: 0.75rem;
  border: none;
  background-color: transparent;
  margin-left: 8px;
}

.upload-social-icons .icon svg {
  height: 1.25rem;
  width: 1.25rem;
  fill: #fff;
}

.upload-signup {
  text-align: center;
  font-size: 0.75rem;
  line-height: 1rem;
  color: rgba(156, 163, 175, 1);
}

</style>
</html>