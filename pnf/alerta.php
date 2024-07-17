<?php 
$conexion = mysqli_connect("localhost","root","","proyectosdbnew");
$pnf = $_GET['pnf'];
$titulo = $_GET['titulo'];
$archivo = $_GET['archivo'];
$consulta = $conexion->query("SELECT * from $pnf where titulo = '$titulo' or archivo = '$archivo'");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alerta de plagio!</title>
</head>
<body>
    <h1>Alerta de plagio!</h1>
    <br>
    <h2>Verifique su titulo de proyecto que coincide con los siguientes:</h2>
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
        <td><a href="<?php echo $mostrar['ruta'] ?>" target="_blank">Ver</a></td>
        <td><a href="<?php echo $mostrar['ruta'] ?>" download="<?php echo $mostrar['archivo'] ?>">Descargar</a></td>
        <td><a href="edit.php?id=<?php echo $mostrar['id']?>">Editar</a></td>
        <td><a href="delete.php?id=<?php echo $mostrar['id']?>">Eliminar</a></td>
    </tr>
    <?php 
     }
    ?>
    </table>
    <label>Desea subir su proyecto? haga click <a href="upload2.php">aquí</a></label>
    <br>
    <a href="upload.php">Volver</a>
</body>
</html>