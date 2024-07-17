<?php 
$conexion = mysqli_connect("localhost","root","","proyectosdbnew");
$id = $_GET['id'];
$consulta = $conexion->query("SELECT * FROM pnf where id='$id'");
$mostrar = mysqli_fetch_array($consulta);
$pnf = $mostrar['pnf'];
$sql = $conexion->query("UPDATE $pnf SET estado = 'Habilitado' where id='$id'");
header("Location: inhabilitados.php");
?>