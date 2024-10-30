<?php 
include("../control/conexion.php");
include("./controladores(admin)/validacionrangos.php");
// LA VARIABLE REDIRECCION ES PARA GUARDAR LA DIRECCION POR SI UN USUARIO INTENTA ESCRIBIR LA URL DIRECTA AL ADMIN VALIDACION(USUARIO ES PARA REDIRIGIR AL USUARIO, Y LA VALIDACION(ADMIN) ES PARA EN CUALQUIER CASO DE QUE EL ADMIN SE META A ALGO DE USUARIO LO LLEVE A ADMIN)
$redireccion = "../pnf(usuario)/main(usuario).php";
include("../control/validacion(usuario).php");
$consulta = $conexion->query("SELECT * FROM usuario");
$consulta2 = $conexion->query("SELECT * FROM usuarioinformacion");
if($_SESSION['rango'] == 2){
    echo "No tienes los permisos suficientes para estar aquí";
}
include("../control/validacionmain.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de usuarios</title>
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
            <li><a href="informatica.php" class="pnf"><i class="fa-solid fa-laptop-code"></i> PNF Informatica</a></li>
            <li><a href="administracion.php" class="pnf"><i class="fa-solid fa-user-tie"></i> PNF Administracion</a></li>
            <li><a href="agroalimentacion.php" class="pnf"><i class="fa-solid fa-money-bill-wheat"></i> PNF Agroalimentacion</a></li>
            <li><a href="enfermeria.php" class="pnf"><i class="fa-solid fa-user-nurse"></i> PNF Enfermeria</a></li>
            <li><a href="higiene_laboral.php" class="pnf"><i class="fa-solid fa-hands-bubbles"></i> PNF Higiene & Seguridad Laboral</a></li>
            <li><a href="avanzada.php" class="pnf"><i class="fa-solid fa-building-columns"></i> PNF Avanzado</a></li>
        </ul>
        </li>
        
        </nav>
        <a href="../nosotros.php" class="re">Nosotros</a>
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
    <table class="tablasearch">
        <tr>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>C.I</th>
            <th>Admin</th>
        </tr>
        <?php 
        while($mostrar = mysqli_fetch_array($consulta2)){
              $mostrar2 = mysqli_fetch_array($consulta);
        ?>
        <tr>
            <td><?php echo $mostrar['primernombre']; ?></td>
            <td><?php echo $mostrar['primerapellido'] ?></td>
            <td><?php echo $mostrar['usuarioinfoid'] ?></td>
            <td><?php echo ($mostrar2['rango'] == 0) ? "No" : "Si";?></td>
            <td><a class="blueone" href="./controladores(admin)/rango().php?id=<?=$mostrar2['id']?>&rango=<?=$mostrar2['rango']?>"><?php echo ($mostrar2['rango'] == 0) ? "Dar Admin" : 'Quitar Admin';?></a></td>
        </tr>
        <?php 
            }
        ?>
    </table>
    <?php 
        if(isset($_GET['msj'])){
            $msj = $_GET['msj'];
       
    ?>
    <input type="hidden" value='<?=$msj?>' id="msj">
    <?php 
            }
    ?>
</body>
<script>
    const msj = document.querySelector("#msj");
    if(msj.value.length > 2){
        alert(`${msj.value}`);
    }
</script>
</html>