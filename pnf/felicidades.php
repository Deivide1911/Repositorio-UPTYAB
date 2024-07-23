<?php 
include("../control/conexion.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmación</title>
</head>
<body>
    <?php 
        if(@$_GET['pnf']){
            $pnf = $_GET['pnf'];
            $enlace = $pnf.'.php';
    ?>
    <h1>Archivo subido con éxito!</h1>
    <br>
    <a href="<?php echo $enlace?>">Volver</a>
    <?php } else{?>
        <a href="main.php">Volver a la página principal</a>";
    <?php } ?>

</body>
</html>