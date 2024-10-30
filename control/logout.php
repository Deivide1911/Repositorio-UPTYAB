<?php
session_start();
include("conexion.php");
date_default_timezone_set("America/Caracas");
$hora = date("H:i:s");
$idunic=$_SESSION['idunic'];
$registroOut = $conexion->query("UPDATE entradas SET hora_salida='$hora' WHERE idunic LIKE'$idunic'");
session_unset();
session_destroy();
header("Location: ../index.php");
?>