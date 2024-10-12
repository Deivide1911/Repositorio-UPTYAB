<?php 
include("../control/conexion.php");
if(isset($_GET['id']) && isset($_GET['idpnf']) && isset($_GET['direccion'])){
    $id = $_GET['id'];
    $idpnf = $_GET['idpnf'];
    $direccion = $_GET['direccion'];
    $consulta = $conexion->query("SELECT * FROM pnf where idpnf='$idpnf'");
    $select = mysqli_fetch_array($consulta);
    $pnf = $select['pnf'];
    $sql = $conexion->query("SELECT * FROM $pnf where id='$id'");
    $mostrar = mysqli_fetch_array($sql);
    $titulo = $mostrar['titulo'];
    $trayecto = $mostrar['trayecto'];
    $tipoproyecto = $mostrar['tipoproyecto'];
    $autores = $mostrar['autores'];
    $etiquetas = $mostrar['etiquetas'];
}
else{
    echo "Ocurrió un error!";
}
?>