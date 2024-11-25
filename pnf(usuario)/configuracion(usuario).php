<?php 
    include('../control/conexion.php');
    $redireccion = 'configuracion.php';
    include("../control/validacion(admin).php");
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
    include("config.php"); 
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
        <a href="main(usuario).php"><img src="../img/logomin.png" alt="logo" width="150px" height="70px"></a>
        <nav class="dropmenu">
        <ul>
            <li><p class="re"><a><i class="fa-solid fa-bars"></i> Selecciona un PNF</p></li></a>
            <li>
        <ul class="contenido">
            <li><a href="informatica(usuario).php" class="pnf"><i class="fa-solid fa-laptop-code"></i> PNF Informática</a></li>
            <li><a href="administracion(usuario).php" class="pnf"><i class="fa-solid fa-user-tie"></i> PNF Administración</a></li>
            <li><a href="agroalimentacion(usuario).php" class="pnf"><i class="fa-solid fa-money-bill-wheat"></i> PNF Agroalimentación</a></li>
            <li><a href="enfermeria(usuario).php" class="pnf"><i class="fa-solid fa-user-nurse"></i> PNF Enfermería</a></li>
            <li><a href="higiene_laboral(usuario).php" class="pnf"><i class="fa-solid fa-hands-bubbles"></i> PNF Higiene & Seguridad Laboral</a></li>
            <li><a href="avanzada(usuario).php" class="pnf"><i class="fa-solid fa-building-columns"></i> PNF Avanzado</a></li>
        </ul>
        </li>
        </nav>
        <a href="nosotros(usuario).php" class="re">Nosotros</a>
        <nav class="dropmenu">
        <a class="usericon"><i class="fa-solid fa-user"></i>
            Usuario</a>
        <ul>
            <ul class="contenido">
                <li><a href="../control/logout.php"><i class="fa-solid fa-right-from-bracket"></i> Cerrar Sesión</a></li>
                <li><a href="configuracion(usuario).php?id=<?php echo $_SESSION['id'] ?>"><i class="fa-solid fa-gear"></i> Configuracion</a></li>
            </ul>
        </ul>
        </nav>
    </header>
    <form class="config-container" method="post" action="config.php">
        <h3>Edita tu cuenta</h3>
        <input class="inputios" value="<?=$pnombre?>" type="text" name="pnombre" id="primer-nombre" placeholder="Ingresa tu Primer Nombre" required>
        <input class="inputios" value="<?=$snombre?>"  type="text" name="snombre" id="segundo-nombre" placeholder="Segundo Nombre (En caso de no tener dejar así)" required>
        <input class="inputios" value="<?=$papellido?>"  type="text" name="papellido" id="primer-apellido" placeholder="Ingresa tu Primer Apellido" required>
        <input class="inputios" value="<?=$sapellido?>"  type="text" name="sapellido" id="segundo-apellido" placeholder="Segundo Apellido (En caso de no tener dejar así)" required>
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
</html>