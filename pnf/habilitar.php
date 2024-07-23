<?php 
include("../control/conexion.php");
$id = $_GET['id'];
$direccion = $_GET['direccion'];
$enlace = $direccion.'.php';
$consulta = $conexion->query("SELECT * FROM pnf where id='$id'");
$mostrar = mysqli_fetch_array($consulta);
$pnf = $mostrar['pnf'];
$sql = $conexion->query("UPDATE $pnf SET estado = 'Habilitado' where id='$id'");
header("Location: $enlace");
?>