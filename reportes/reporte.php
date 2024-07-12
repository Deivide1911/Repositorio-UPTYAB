<?php 
$conexion = mysqli_connect("localhost","root","","proyectosdbnew");
$consulta = $conexion->query("SELECT * FROM entradas order by fecha desc");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reportes</title>
</head>
<body>
    <?php 
        while($mostrar = mysqli_fetch_array($consulta)){
    ?>
    <p> <?php echo "El usuario ",$mostrar['nombre']," ",$mostrar['apellido']," (",$mostrar['id'],")"," ha ingresado el ",date('d',strtotime($mostrar['fecha'])),"-",date('m',strtotime($mostrar['fecha'])),"-",date('Y',strtotime($mostrar['fecha']))," a las ",$mostrar['hora']?></p>
    <?php 
        }
    ?>
    <a href="../pnf/main.php">Volver</a>
</body>
</html>