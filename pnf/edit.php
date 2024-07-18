<?php 
include("../control/conexion.php");
$id = $_GET['id'];
$consulta = $conexion->query("SELECT * FROM pnf where id='$id'");
$select = mysqli_fetch_array($consulta);
$pnf = $select['pnf'];
$sql = $conexion->query("SELECT * FROM $pnf");
$mostrar = mysqli_fetch_array($sql);
$titulo = $mostrar['titulo'];
$trayecto = $mostrar['trayecto'];
$tipoproyecto = $mostrar['tipoproyecto'];
$autores = $mostrar['autores'];
$etiquetas = $mostrar['etiquetas'];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar</title>
</head>
<body>
    <form action="edit_consulta.php" method ="post">
        <label for="titulo">Titulo</label>
        <input type="text" placeholder="Título" value="<?=$titulo?>" id="titulo" name="titulo">
        <br>
        <label for="trayecto">Trayecto</label>
        <input type="text" placeholder="Trayecto" value="<?=$trayecto?>"id="trayecto" name="trayecto">
        <br>
        <label for="tipo de proyecto">Tipo de proyecto</label>
        <input type="text" placeholder="Tipo de proyecto" value="<?=$tipoproyecto?>" id="tipo de proyecto" name="tipoproyecto">
        <br>
        <label for="autores">Autores</label>
        <input type="text" placeholder="Autores" value="<?=$autores?>"id="autores" name="autores">
        <br>
        <label for="etiquetas">Etiquetas</label>
        <input type="text" placeholder="Etiquetas" value="<?=$etiquetas?>" id="etiquetas" name="etiquetas">
        <input type="hidden" value=<?=$id?> name="id">
        <input type="hidden" value=<?=$pnf?> name="pnf">
        <br>
        <input type="submit" name="btn">
    </form>
    <a href="main.php">Volver</a>
</body>
</html>