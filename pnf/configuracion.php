<?php 
    include('../control/conexion.php');
    $redireccion ='configuracion(usuario).php';
    include("../control/validacion(usuario).php");
    include("../control/validacionmain.php");
    $id = $_GET['id'];
    $consulta = $conexion->query("SELECT * FROM usuarioinformacion where usuarioinfoid = '$id'");
    $consulta2 = $conexion->query("SELECT * FROM usuario where id = '$id'");
    $mostrar2 = mysqli_fetch_array($consulta2);
    $mostrar = mysqli_fetch_array($consulta);
    $pnombre = $mostrar['primernombre'];
    $snombre = $mostrar['segundonombre'];
    $papellido = $mostrar['primerapellido'];
    $sapellido = $mostrar['segundoapellido'];
    $sexo = $mostrar['sexo'];
    $fecha = $mostrar['fecha'];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edita tu cuenta</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Urbanist:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/all.css">
    <link rel="stylesheet" href="../estilos/maincss.css">
    <link rel="stylesheet" href="../estilos/style.css">
    
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
            <li><a href="informatica.php" class="pnf"><i class="fa-solid fa-laptop-code"></i> PNF Informatica</a></li>
            <li><a href="administracion.php" class="pnf"><i class="fa-solid fa-user-tie"></i> PNF Administracion</a></li>
            <li><a href="agroalimentacion.php" class="pnf"><i class="fa-solid fa-money-bill-wheat"></i> PNF Agroalimentacion</a></li>
            <li><a href="enfermeria.php" class="pnf"><i class="fa-solid fa-user-nurse"></i> PNF Enfermeria</a></li>
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
    
    <form class="config-container" method="post" action="config.php">
        <h3>Edita tu cuenta</h3>
        <input class="inputios" value="<?=$pnombre?>" type="text" name="pnombre" id="primer-nombre" placeholder="Ingresa tu Primer Nombre" required>
        <input class="inputios" value="<?=$snombre?>"  type="text" name="snombre" id="segundo-nombre" placeholder="Ingresa tu Segundo Nombre" required>
        <input class="inputios" value="<?=$papellido?>"  type="text" name="papellido" id="primer-apellido" placeholder="Ingresa tu Primer Apellido" required>
        <input class="inputios" value="<?=$sapellido?>"  type="text" name="sapellido" id="segundo-apellido" placeholder="Ingresa tu Segundo Apellido" required>
        <input class="inputios" value="<?=$mostrar2['id']?>"  type="text" name="ci" id="cedula" placeholder="Ingresa tu Cedula" required readonly>
        <p class="parrafo">Seleccione su sexo</p>     
          <div class="mydict">
            <label for="sexo1" class="sex">
              <input type="radio" id="sexo1" name="sexo" value="Hombre" <?php if($sexo == 'Hombre'){ echo 'Checked';} ?>>
              <span>Hombre</span>
            </label>
            <label for="sexo2" class="sex">
              <input type="radio" id="sexo2" name="sexo" value="Mujer" <?php if($sexo == 'Mujer'){ echo 'Checked';} ?>>
              <span>Mujer</span>
            </label>
          </div>
        <p class="parrafo">Fecha de nacimiento</p>
            <input class="inputios" value="<?=$mostrar['fecha']?>" type="date" id="fecha" name="fecha" required>
            <input class="inputios"  value="<?=$mostrar2['contraseña']?>"  type="password" name="contraseña" id="pass" placeholder="Ingresa tu Contraseña" required>
            <div for="mostrar" class="containernew">
                <input type="checkbox" id="mostrar" class="checknew">
                <label for="mostrar" class="mostrarpass">Mostrar Contraseña</label>
            </div>
          <button class="botonconfig" type="submit" name="btn" value="Editar"><span class="">Editar</span><span>Editar</span></button>
          <input type="hidden" value=<?=$id?> name="id">
    </form>

</body>
<script src="../js/mostrar.js"></script>
<style>
    /* CONFIGURACION.PHP */
.mostrarpass{
  font-size: 1.5rem;
  user-select:none;
  cursor:pointer;
  margin-right:45px;
}
.checknew{
  margin-left:90px;
  width:30px;
  height:30px;
  cursor:pointer;
}
.containernew{
  display:flex;
  width:100%;
  align-items:center;
  justify-content:center;
}
.check{
  width:35px;
  height:35px;
}

.config-container{
    background-color: #e9e9e9;
    margin: auto;
    padding: 10px;
    display: flex;
    flex-direction: column;
    border-radius: 30px;
    max-width: 400px;
    width:400px;
    justify-content: center;

}
.inputios {
 border: none;
 padding: 1rem;
 border-radius: 1rem;
 background: #e8e8e8;
 box-shadow: 20px 20px 60px #c5c5c5,
		-20px -20px 60px #ffffff;
 transition: 0.3s;
 margin: 5px;
}

.inputios:focus {
 outline-color: #e8e8e8;
 background: #e8e8e8;
 box-shadow: inset 20px 20px 60px #c5c5c5,
		inset -20px -20px 60px #ffffff;
 transition: 0.3s;
}
/* Botonconfiguracion */
.botonconfig {
 position: relative;
 overflow: hidden;
 border: 1px solid #18181a;
 color: #18181a;
 display: inline-block;
 font-size: 15px;
 line-height: 15px;
 padding: 18px 18px 17px;
 text-decoration: none;
 cursor: pointer;
 background: #fff;
 user-select: none;
 -webkit-user-select: none;
 touch-action: manipulation;
}

.botonconfig span:first-child {
 position: relative;
 transition: color 600ms cubic-bezier(0.48, 0, 0.12, 1);
 z-index: 10;
}

.botonconfig span:last-child {
 color: white;
 display: block;
 position: absolute;
 bottom: 0;
 transition: all 500ms cubic-bezier(0.48, 0, 0.12, 1);
 z-index: 100;
 opacity: 0;
 top: 50%;
 left: 50%;
 transform: translateY(225%) translateX(-50%);
 height: 14px;
 line-height: 13px;
}

.botonconfig:after {
 content: "";
 position: absolute;
 bottom: -50%;
 left: 0;
 width: 100%;
 height: 100%;
 background-color: black;
 transform-origin: bottom center;
 transition: transform 600ms cubic-bezier(0.48, 0, 0.12, 1);
 transform: skewY(9.3deg) scaleY(0);
 z-index: 50;
}

.botonconfig:hover:after {
 transform-origin: bottom center;
 transform: skewY(9.3deg) scaleY(2);
}

.botonconfig:hover span:last-child {
 transform: translateX(-50%) translateY(-50%);
 opacity: 1;
 transition: all 900ms cubic-bezier(0.48, 0, 0.12, 1);
}
/* Checkbox */

/* Oculta la casilla por defecto */
.containerconfig input {
  position: absolute;
  opacity: 0;
  cursor: pointer;
  height: 0;
  width: 0;
}

.containerconfig {
  display: block;
  position: relative;
  cursor: pointer;
  font-size: 1.5rem;
  user-select: none;
}

/* Crea una casilla de verificación personalizada */
.checkmark {
  --clr: #0B6E4F;
  position: relative;
  top: 0;
  left: 0;
  height: 1.3em;
  width: 1.3em;
  background-color: #ccc;
  border-radius: 50%;
  transition: 300ms;
}

/* Cuando la casilla está marcada, añade un fondo azul */
.containerconfig input:checked ~ .checkmark {
  background-color: var(--clr);
  border-radius: .5rem;
  animation: pulse 500ms ease-in-out;
}

/* Crear la marca de verificación/indicador (oculta cuando no está marcada) */
.checkmark:after {
  content: "";
  position: absolute;
  display: none;
}

/* Mostrar la marca de verificación cuando está marcada */
.containerconfig input:checked ~ .checkmark:after {
  display: block;
}

/* Estilizar la marca de verificación/indicador */
.containerconfig .checkmark:after {
  left: 0.45em;
  top: 0.25em;
  width: 0.25em;
  height: 0.5em;
  border: solid #E0E0E2;
  border-width: 0 0.15em 0.15em 0;
  transform: rotate(45deg);
}

@keyframes pulse {
  0% {
    box-shadow: 0 0 0 #0B6E4F90;
    rotate: 20deg;
  }

  50% {
    rotate: -20deg;
  }

  75% {
    box-shadow: 0 0 0 10px #0B6E4F60;
  }

  100% {
    box-shadow: 0 0 0 13px #0B6E4F30;
    rotate: 0;
  }
}
/* Sexo */
 
:focus {
  outline: 0;
  border-color: #2260ff;
  box-shadow: 0 0 0 4px #b5c9fc;
}

.mydict div {
  display: flex;
  flex-wrap: wrap;
  margin-top: 0.5rem;
  justify-content: center;
}

.mydict input[type="radio"] {
  clip: rect(0 0 0 0);
  clip-path: inset(100%);
  height: 1px;
  overflow: hidden;
  position: absolute;
  white-space: nowrap;
  width: 1px;
}

.mydict input[type="radio"]:checked + span {
  box-shadow: 0 0 0 0.0625em #0043ed;
  background-color: #dee7ff;
  z-index: 1;
  color: #0043ed;
}

.sex span {
  display: block;
  cursor: pointer;
  background-color: #fff;
  padding: 0.375em .75em;
  position: relative;
  margin-left: .0625em;
  box-shadow: 0 0 0 0.0625em #b5bfd9;
  letter-spacing: .05em;
  color: #3e4963;
  text-align: center;
  transition: background-color .5s ease;
}

.sex:first-child span {
  border-radius: .375em 0 0 .375em;
}

.sex:last-child span {
  border-radius: 0 .375em .375em 0;
}

</style>
</html>