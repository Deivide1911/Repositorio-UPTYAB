<?php
include("../control/conexion.php");
$consulta = $conexion->query("SELECT * FROM informatica where estado = 'Habilitado' order by trayecto asc ");
include('../control/validacionmain.php');
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informática</title>
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
            <li><p class="re"><a href="#" ><i class="fa-solid fa-bars"></i> Selecciona un PNF</p></li>
            <li>
        <ul class="contenido">
            <li><a href="informatica.php" class="pnf"><i class="fa-solid fa-laptop-code"></i> PNF Informatica</a></li>
            <li><a href="#" class="pnf"><i class="fa-solid fa-user-tie"></i> PNF Administracion</a></li>
            <li><a href="#" class="pnf"><i class="fa-solid fa-money-bill-wheat"></i> PNF Agroalimentacion</a></li>
            <li><a href="#" class="pnf"><i class="fa-solid fa-user-nurse"></i> PNF Enfermeria</a></li>
            <li><a href="#" class="pnf"><i class="fa-solid fa-hands-bubbles"></i> PNF Higiene Laboral</a></li>
            <li><a href="#" class="pnf"><i class="fa-solid fa-building-columns"></i> PNF Avanzado</a></li>
        </ul>
        </li>
        <ul>
        </ul>
        
        </nav>
        <a href="#" class="re">Nosotros</a>
        <a href="#" class="re">Estadistica</a>
        <a href="../reportes/reporte.php" class="re">Reportes</a>
        <nav class="dropmenu cerrarsesion">
        <a class="usericon"><i class="fa-solid fa-user"></i>
            Admin</a>
        <ul>
            <ul class="contenido">
            <li><a href="../control/logout.php"><i class="fa-solid fa-right-from-bracket"></i> Cerrar Sesión</a></li>
            <li><a href="#"><i class="fa-solid fa-gear"></i> Configuracion</a></li>
            <li><a href="upload.php"><i class="fa-solid fa-file-arrow-up"></i> Subir Proyectos</a></li>
            </ul>
        </ul>
        </nav>
    
    </header>
        <form action="search.php" method="POST" class="barradebusqueda">
            <fieldset class="fieldset">
            <input type="search" placeholder="Buscar en el repositorio..." name="buscar" class="buscador">
            <button type="submit" name="btn" class="botondebusqueda"><i class="fa-solid fa-magnifying-glass"></i></button>
            </fieldset>
        </form>

    <div class="center">
        <a href="upload.php" class="linkupload">Subir mi proyecto</a>
        <a href="inhabilitados.php" class="linkupload">Ver proyectos eliminados</a>
    </div>

    <h2>Informática</h2>
        <table class="tablasearch">
            <tr>
                <th>Título</th>
                <th>Trayecto</th>
                <th>Tipo de proyecto</th>
                <th>Autores</th>
                <th>Etiquetas</th>
                <th>PDF</th>
                <th>Descarga</th>
            </tr>
            <?php while($mostrar = mysqli_fetch_array($consulta)){
            ?>
            <tr>
                <td><?php echo $mostrar['titulo'] ?></td>
                <td><?php echo $mostrar['trayecto'] ?></td>
                <td><?php echo $mostrar['tipoproyecto'] ?></td>
                <td><?php echo $mostrar['autores'] ?></td>
                <td><?php echo $mostrar['etiquetas'] ?></td>
                <td><a href="<?php echo $mostrar['ruta'] ?>" target="_blank">Ver</a></td>
                <td><a href="<?php echo $mostrar['ruta'] ?>" download="<?php echo $mostrar['archivo'] ?>">Descargar</a></td>
                <td><a href="edit.php?id=<?php echo $mostrar['id']?>">Editar</a></td>
                <td><a href="delete.php?id=<?php echo $mostrar['id']?>">Inhabilitar</a></td>
            </tr>
            <?php  } ?>
        </table>
    
</body>
<style>
        /* No agarró los cambios en maincss.css los tuve que poner aqui */
    /* search.php */
.tablasearch{
    font-family: "Urbanist", sans-serif;
    font-size: 16px;
    background-color: #e7e1e1;
    padding: 10px;
    text-align: center;
    
}
.tablasearch td{
    border-bottom: 1px solid black;
    padding-top: 10px;
}
.tablasearch a{
    color: blue;
}

.center{
    display:flex;
    flex-direction:column;
    width:100%;
    background-color: #4954b9;
}

.linkupload{
    color: #e7e1e1;
    margin:auto;
    font-family: "Urbanist", sans-serif;
 }
    .linkupload:hover{
        color: blue;
}
h2{
    color: #13112e;
    margin: auto;
    font-family: "Urbanist", sans-serif;
}
</style>
</html>