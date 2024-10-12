<?php 
include("../control/conexion.php");
session_start();
$id = $_SESSION['id'];
$consulta = $conexion->query("SELECT * FROM usuario WHERE id='$id'");
if ($consulta->num_rows > 0) {
    $mostrar = $consulta->fetch_assoc();
    $rango = $mostrar['rango'];
    $_SESSION['rango'] = $rango;
    if($rango == 0){
        header("Location: main.php");
    }
}
else{
    echo "Ha ocurrido un error";
}

?>