<?php 
include("../control/conexion.php");
// RECIBO EL ID DEL PNF Y EL ID DEL PROYECTO, TAMBIÉN RECIBO LA DIRECCIÓN DEL PNF DE DONDE VIENE
if(isset($_GET['idpnf']) && isset($_GET['direccion']) && $_GET['id']){
    $idpnf = $_GET['idpnf'];
    $id = $_GET['id'];
    $direccion = $_GET['direccion'];
    // CONSULTA PARA SABER DE QUE PNF ES EL IDPNF Y SACAR EL NOMBRE DEL PNF PARA LA VARIABLE $pnf DE ALLÍ SABRÉ DE QUE TABLA INHABILITARÉ SEGÚN ID DEL PROYECTO QUE ENVIÉ
    $consulta = $conexion->query("SELECT * FROM pnf where idpnf='$idpnf'");
    $mostrar = mysqli_fetch_array($consulta);
    $pnf = $mostrar['pnf'];
    $inhabilitar = $conexion->query("UPDATE $pnf SET estado = 'Inhabilitado' where id='$id'");
    header("Location: $direccion");
}
// EN CASO DE QUE NO EXISTA HAGO LO SIGUIENTE:
else{
    echo "Ha ocurrido un error!<br><a href='main.php'>Volver</a>";
}
?>
