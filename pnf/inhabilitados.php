<?php
$conexion = mysqli_connect("localhost","root","","proyectosdbnew");
$consulta = $conexion->query("SELECT * FROM informatica where estado = 'Inhabilitado' order by trayecto asc ");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informática</title>
</head>
<body>
    <a href="upload.php">Subir mi proyecto</a>
    <table>
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
            <td><a href="#">Descargar</a></td>
            <td><a href="edit.php?id=<?php echo $mostrar['id']?>">Editar</a></td>
            <td><a href="recuperacion.php?id=<?php echo $mostrar['id']?>">Deshacer el eliminar</a></td>
        </tr>
        <?php  } ?>
    </table>
    <a href="informatica.php">Ver proyectos</a>
</body>
</html>