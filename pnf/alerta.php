<?php 
$conexion = mysqli_connect("localhost","root","","proyectosdbnew");
$pnf = $_GET['pnf'];
$titulo = $_GET['titulo'];
$etiquetas = $_GET['etiquetas'];
$trayecto = $_GET['trayecto'];
$autores=$_GET['autores'];
$tipoproyecto=$_GET['tipoproyecto'];
$consulta = $conexion->query("SELECT * from $pnf where titulo = '$titulo'");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alerta de plagio!</title>
</head>
<body>
    <h1>Verifique su titulo de proyecto que coincide con los siguientes:</h1>
    <table>
        <tr>
            <th>Titulo</th>
            <th>Tipo de proyecto</th>
            <th>Autores</th>
            <th>Etiquetas</th>
        </tr>
    <?php 
        while($mostrar = mysqli_fetch_array($consulta)){
    ?>
    <tr>
        <td><?php echo $mostrar['titulo'] ?></td>
        <td><?php echo $mostrar['tipoproyecto'] ?></td>
        <td><?php echo $mostrar['autores'] ?></td>
        <td><?php echo $mostrar['etiquetas'] ?></td>
    </tr>
    <?php 
     }
    ?>
    </table>
    <label>Desea subir su proyecto? haga click <a href="upload2.html">aquí</a></label>
    <br>
    <a href="upload.html">Volver</a>
</body>
</html>