<?php 
include("../control/conexion.php");
$id = $_GET['id'];
$consulta = $conexion->query("SELECT * FROM pnf where id='$id'");
$mostrar = mysqli_fetch_array($consulta);
$pnf = $mostrar['pnf'];
$sql = $conexion->query("UPDATE $pnf SET estado = 'Inhabilitado' where id='$id'");
header("Location: informatica.php");
?>