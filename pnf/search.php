<?php
$conexion = mysqli_connect("localhost","root","","proyectosdbnew");
$buscar = $_POST['buscar'];
$consulta =$conexion->query("SELECT * from informatica where trayecto like '$buscar' '%' or titulo like  '$buscar' '%' or tipoproyecto like '$buscar' '%' or archivo like '$buscar' '%' or etiquetas like '$buscar' '%' or autores like '$buscar' '%' order by trayecto asc"); 
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
    <br>
    <form action="search.php" method="POST">
        <input type="search" placeholder="Buscar en el repositorio..." name="buscar">
        <input type="submit" name="btn">
    </form>
    <br>
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
            <td><a href="delete.php?id=<?php echo $mostrar['id']?>">Eliminar</a></td>
        </tr>
        <?php  } ?>
    </table>
    <a href="inhabilitados.php">Ver proyectos eliminados</a>
</body>
</html>