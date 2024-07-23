<?php 
include("../control/conexion.php");
if(@$_GET['id'] && @$_GET['direccion']){
    $id = $_GET['id'];
    $direccion = $_GET['direccion'];
    $consulta = $conexion->query("SELECT * FROM pnf where id='$id'");
    $mostrar = mysqli_fetch_array($consulta);
    $pnf = $mostrar['pnf'];
    $enlace = $direccion.'.php';
    $sql = $conexion->query("UPDATE $pnf SET estado = 'Inhabilitado' where id='$id'");
    header("Location: $direccion");
}
else{
    echo "Ha ocurrido un error!<br><a href='main.php'>Volver</a>";
}
?>
