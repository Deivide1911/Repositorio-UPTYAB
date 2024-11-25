<?php 
include("../control/conexion.php");

// RECIBO EL ID DEL PNF Y EL ID DEL PROYECTO, TAMBIÉN RECIBO LA DIRECCIÓN DEL PNF DE DONDE VIENE
if(isset($_GET['idpnf']) && isset($_GET['direccion']) && isset($_GET['id'])){
    $idpnf = $_GET['idpnf'];
    $id = $_GET['id'];
    $direccion = $_GET['direccion'];

    // CONSULTA PARA SABER DE QUE PNF ES EL IDPNF Y SACAR EL NOMBRE DEL PNF PARA LA VARIABLE $pnf DE ALLÍ SABRÉ DE QUE TABLA INHABILITARÉ SEGÚN ID DEL PROYECTO QUE ENVIÉ
    $consulta = $conexion->query("SELECT * FROM pnf WHERE idpnf='$idpnf'");
    $mostrar = mysqli_fetch_array($consulta);
    $pnf = $mostrar['pnf'];

    // CONSULTA PARA ACTUALIZAR EL ESTADO
    $inhabilitar = $conexion->query("UPDATE $pnf SET estado = 'Inhabilitado' WHERE id='$id'");
    
    if ($inhabilitar) {
        header("Location: $direccion");
    } else {
        echo "Error al inhabilitar: " . $conexion->error;
    }
}
// EN CASO DE QUE NO EXISTA HAGO LO SIGUIENTE:
else{
    echo "Ha ocurrido un error!<br><a href='main.php'>Volver</a>";
}
?>
