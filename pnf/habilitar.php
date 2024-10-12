<?php 
include("../control/conexion.php");
if(isset($_GET['id']) && $_GET['idpnf'] && $_GET['direccion']){
    $idpnf = $_GET['idpnf'];
    $id = $_GET['id'];
    $direccion = $_GET['direccion'];
    $enlace = $direccion.'.php';
    $consulta = $conexion->query("SELECT * FROM pnf where idpnf='$idpnf'");
    $mostrar = mysqli_fetch_array($consulta);
    $pnf = $mostrar['pnf'];
    $sql = $conexion->query("UPDATE $pnf SET estado = 'Habilitado' where id='$id'");
    header("Location: $enlace");
}
else{
    echo "Ocurrio un error";
}
?>