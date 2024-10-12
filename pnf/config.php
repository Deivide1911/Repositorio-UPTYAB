<?php 
include('../control/conexion.php');
if(isset($_POST['btn'])){
    $pnombre = ucfirst(trim($_POST['pnombre']));
    $snombre = ucfirst(trim($_POST['snombre']));
    $papellido = ucfirst(trim($_POST['papellido']));
    $sapellido = ucfirst(trim($_POST['sapellido']));
    $fecha = trim($_POST['fecha']);
    $ci = trim($_POST['ci']);
    $sexo = trim($_POST['sexo']);
    $contraseña = trim($_POST['contraseña']);
    $id = $_POST['id'];
    if(strlen($pnombre) > 1 && strlen($snombre) > 1 && strlen($papellido) > 1 && strlen($sapellido) > 1 && strlen($fecha) > 1 && strlen($ci) > 1 && strlen($contraseña) > 1 && isset($sexo)){
        $consulta = $conexion->query("UPDATE usuario SET contraseña = '$contraseña' where id like '$id'");
        $consulta2 = $conexion->query("UPDATE usuarioinformacion SET primernombre = '$pnombre', segundonombre = '$snombre',primerapellido = '$papellido', segundoapellido = '$sapellido',fecha = '$fecha', sexo = '$sexo' where usuarioinfoid like '$id'");
        header("Location: exito.php");
        $consulta3 = $conexion->query("UPDATE entradas SET nombre = '$pnombre',apellido = '$papellido',id='$id' where id like '$id'");
    }
    else{
        echo "Debes completar algún campo!";
    }
}
?>