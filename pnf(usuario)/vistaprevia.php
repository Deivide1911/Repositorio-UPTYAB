<?php 
include("../control/conexion.php");
if(isset($_GET['ruta'])){
    $ruta = $_GET['ruta'];
}
else{
    echo "No se ha podido generar vista previa";
}
include("../control/validacionmain.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vista previa</title>
</head>
<body>
    <iframe src="<?php echo $ruta?>" width="1000" height="900"></iframe>
</body>
</html>
<style>
        iframe {
            pointer-events: none;
        }
        body{
            margin:0;
        }
</style>