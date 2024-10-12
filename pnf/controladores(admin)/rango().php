<?php 
include("../../control/conexion.php");
session_start();
if(isset($_GET['rango']) && isset($_GET['id'])){
    $rango = $_GET['rango'];
    $id = $_GET['id'];
    $idon = $_SESSION['id'];
    if($id == 123 && $idon == 123){
        $msj = "No puedes quitarte el administrador!";
        header("Location: ../list_users.php?msj=$msj");
    }
    else if ($id == 123){
        $msj = "No puedes quitarle el admin a esta persona!";
        header("Location: ../list_users.php?msj=$msj");
    }
    else{
        if($rango == 1){
            $consulta = $conexion->query("UPDATE usuario SET rango = 0 WHERE id='$id'");
            header("Location: ../list_users.php");
        }
        else{
            $consulta = $conexion->query("UPDATE usuario SET rango = 1 WHERE id='$id'");
            header("Location: ../list_users.php");
        }
    }
}
else{
    echo "Ocurrió un error!";
}
?>