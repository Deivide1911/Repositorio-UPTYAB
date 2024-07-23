<?php
include("../control/conexion.php");
if(@$_GET['direccion']){
    $direccion = $_GET['direccion'];
}
$consulta = $conexion->query(
    "SELECT * FROM informatica 
    where estado LIKE 'Inhabilitado' 
    UNION
    SELECT * FROM administracion
    where estado LIKE 'Inhabilitado' 
    UNION
    SELECT * FROM agroalimentacion
    where estado LIKE 'Inhabilitado' 
    UNION
    SELECT * FROM avanzada
    where estado LIKE 'Inhabilitado' 
    UNION
    SELECT * FROM enfermeria
    where estado LIKE 'Inhabilitado'
    UNION
    SELECT * FROM higiene_laboral
    where estado LIKE 'Inhabilitado' 
    order by trayecto asc
");
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
            <td><a href="<?php echo $mostrar['ruta'] ?>" download="<?php echo $mostrar['archivo'] ?>">Descargar</a></td>
            <td><a href="edit.php?id=<?php echo $mostrar['id']?>">Editar</a></td>
            <td><a href="habilitar.php?id=<?php echo $mostrar['id']?>&direccion=inhabilitados">Habilitar</a></td>
        </tr>
        <?php  } ?>
    </table>
    <a href="<?php echo $direccion?>">Volver</a>
</body>
</html>