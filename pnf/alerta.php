<?php 
include("../control/conexion.php");
$pnf = $_GET['pnf'];
$titulo = $_GET['titulo'];
$archivo = $_GET['archivo'];
$consulta = $conexion->query("SELECT * from $pnf where titulo = '$titulo' or archivo = '$archivo'");
$consulta2 = $conexion->query("SELECT * from $pnf where titulo = '$titulo' and archivo = '$archivo'");
$consulta3 =$conexion->query("SELECT * from $pnf where archivo = '$archivo'");
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
    <?php 
        if($consulta2->fetch_object()){
            echo "<h2>Su título y su nombre de archivo coinciden con los siguientes proyectos:</h2>";
        }
        else if($consulta3->fetch_object()){
            echo "<h2>Ups! su nombre de archivo coincide con los siguientes proyectos:</h2>";
        }
        else{
            echo "<h2>Ups! su título coincide con los siguientes proyectos:</h2>";
        }
    ?>
    <table>
        <tr>
            <th>Titulo</th>
            <th>Tipo de proyecto</th>
            <th>Autores</th>
            <th>Etiquetas</th>
            <th>Nombre del archivo</th>
        </tr>
    <?php 
        while($mostrar = mysqli_fetch_array($consulta)){
    ?>
    <tr>
        <td><?php echo $mostrar['titulo'] ?></td>
        <td><?php echo $mostrar['tipoproyecto'] ?></td>
        <td><?php echo $mostrar['autores'] ?></td>
        <td><?php echo $mostrar['etiquetas'] ?></td>
        <td><?php echo $mostrar['archivo'] ?></td>
        <td><a href="<?php echo $mostrar['ruta'] ?>" target="_blank">Ver</a></td>
        <td><a href="<?php echo $mostrar['ruta'] ?>" download="<?php echo $mostrar['archivo'] ?>">Descargar</a></td>
        <td><a href="edit.php?id=<?php echo $mostrar['id']?>">Editar</a></td>
        <td><a href="delete.php?id=<?php echo $mostrar['id']?>">Inhabilitar</a></td>
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