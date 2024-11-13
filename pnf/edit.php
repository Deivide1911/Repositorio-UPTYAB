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
<body class="fondoedit">
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
    <div class="volveredit">
        <a class="blueone margin-edit" href="<?php echo $direccion ?>">Volver</a>
    </div>
    <div class="upload-form-container">
        <h2 class="upload-title">Edita tu proyecto</h2>
        <form action="./controladores(admin)/edit_consulta.php" method ="post" class="upload-form">
            <div class="upload-input-group">
            <label for="titulo">Titulo</label>
            <input type="text" placeholder="Título" value="<?=$titulo?>" id="titulo" name="titulo" class="inputnew">
            </div>
            <div class="upload-input-group">
            <label for="trayecto">Trayecto</label>
            <select name="trayecto">
                <option value="1" <?= $trayecto == 1 ? 'selected' : '' ?>>1</option>
                <option value="2" <?= $trayecto == 2 ? 'selected' : '' ?>>2</option>
                <option value="3" <?= $trayecto == 3 ? 'selected' : '' ?>>3</option>
                <option value="4" <?= $trayecto == 4 ? 'selected' : '' ?>>4</option>
            </select>
            </div>
            <div class="upload-input-group">
            <label for="tipo de proyecto">Tipo de proyecto</label>
            <select name="tipoproyecto" value="<?=$tipoproyecto?>">
                <option value="Sociotecnológico" <?= $tipoproyecto == 'Sociotecnológico' ? 'selected' : '' ?>>Sociotecnológico</option>
                <option value="Comunitario" <?= $tipoproyecto == 'Comunitario' ? 'selected' : '' ?>>Comunitario</option>
            </select>
            </div>
            <input type="hidden" name="direccion" value="<?=$direccion?>">
            <div class="upload-input-group">
            <label for="autores">Autores</label>
            <input type="text" placeholder="Autores" value="<?=$autores?>"id="autores" name="autores" class="inputnew">
            </div>
            <div class="upload-input-group">
            <label for="etiquetas">Etiquetas</label>
            <input type="text" placeholder="Etiquetas" value="<?=$etiquetas?>" id="etiquetas" name="etiquetas" class="inputnew">
            <input type="hidden" value=<?=$id?> name="id">
            <input type="hidden" value=<?=$pnf?> name="pnf">
            </div>
            <br>
            <input type="submit" name="btn" class="upload-sign">
        </form>
    </div>
    
</body>
<style>
    .volveredit{
        display: flex;
        justify-content: center;
        font-weight: 700;
        padding: 10px;
        background-color: #67aeff;
    }
    .volveredit:hover a{
      color: #238aff;
    }
    .fondoedit{
        background-color: #313131;
        background-image: radial-gradient(rgba(255, 255, 255, 0.171) 2px, transparent 0);
        background-size: 30px 30px;
        background-position: -5px -5px;
        font-family: "Nunito", sans-serif;
    }
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
  color: white;
  display: flex;
  justify-content: center;
}

.upload-form {
  margin-top: 1.5rem;
}

.upload-input-group {
  margin-top: 0.25rem;
  font-size: 0.875rem;
  line-height: 1.25rem;
  margin: 0;
  display: flex;
  justify-content: center;
  align-items: center;
  flex-direction: column;
}

.upload-input-group label {
  display: block;
  color: white;
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
  border-radius: 10px;
  margin: 0px auto;
  background: #cc7cff;
  border: none;
  color: black;
  max-width: 100%;
  outline: none;
  padding: 10px 60px;
  text-align: center;
  font-weight: 900;
  display: flex;
  justify-content: center;
}
.upload-sign:hover{
  color: white;
  box-shadow: 0px 0px 10px 1px rgba(227,148,227,1);
}
</style>
</html>