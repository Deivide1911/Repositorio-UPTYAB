<?php
$conexion = mysqli_connect("localhost","root","","proyectosdbnew");
$consulta = $conexion->query("SELECT * FROM informatica order by trayecto asc");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informática</title>
</head>
<body>
    <a href="upload.html">Subir mi proyecto</a>
    <table>
        <tr>
            <th>Título</th>
            <th>Trayecto</th>
            <th>Tipo de proyecto</th>
            <th>Autores</th>
            <th>Etiquetas</th>
        </tr>
        <?php while($mostrar = mysqli_fetch_array($consulta)){
        ?>
        <tr>
            <td><?php echo $mostrar['titulo'] ?></td>
            <td><?php echo $mostrar['trayecto'] ?></td>
            <td><?php echo $mostrar['tipoproyecto'] ?></td>
            <td><?php echo $mostrar['autores'] ?></td>
            <td><?php echo $mostrar['etiquetas'] ?></td>
        </tr>
        <?php  } ?>
    </table>
</body>
</html>