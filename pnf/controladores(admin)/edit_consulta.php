<?php 
include("../../control/conexion.php");
if(isset($_POST['btn'])){
    $titulo = $_POST['titulo'];
    $trayecto = $_POST['trayecto'];
    $tipoproyecto = $_POST['tipoproyecto'];
    $autores = $_POST['autores'];
    $etiquetas = $_POST['etiquetas'];
    $pnf = $_POST['pnf'];
    $id = $_POST['id'];
    $direccion = $_POST['direccion'];
    $consulta = $conexion->query("UPDATE $pnf SET titulo = '$titulo', trayecto = '$trayecto',tipoproyecto='$tipoproyecto',autores='$autores',etiquetas='$etiquetas' where id like $id");
    header("Location: ../$direccion");
}
else{
    echo "No se ha enviado ninguna consulta";
}
?>