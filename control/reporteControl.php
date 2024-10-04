<?php
// Validando si ya había búsqueda o no
if(isset($_POST['busq'])){
    if(isset($_POST['mes']) && isset($_POST['dia'])){
        $mes = $_POST['mes'];
        $dia = $_POST['dia'];
        $año = date('Y'); 
        if($mes != 'a' && $dia != 'a'){
        $consulta = $conexion->query("SELECT * FROM entradas WHERE MONTH(fecha) = '$mes' AND DAY(fecha) = '$dia' AND YEAR(fecha) = '$año' order by idunic desc");
        }
        else if($mes != 'a' && $dia == 'a'){
        $consulta = $conexion->query("SELECT * FROM entradas WHERE MONTH(fecha) = '$mes' AND YEAR(fecha) = '$año' order by idunic desc");
        }
        else{
            echo "Se deben completar los campos para realizar la búsqueda correctamente";
            $consulta = $conexion->query("SELECT * FROM entradas order by idunic desc");

        }
    }
    else if (isset($_POST['fecha_inicio']) && isset($_POST['fecha_final'])){
        $fecha_inicio = $_POST['fecha_inicio'];
        $fecha_final = $_POST['fecha_final'];
        $consulta = $conexion->query("SELECT * FROM entradas WHERE fecha BETWEEN '$fecha_inicio' AND '$fecha_final' ORDER BY idunic desc");
    }
    else{
        $consulta = $conexion->query("SELECT * FROM entradas order by idunic desc");
    }
}
else{
$consulta = $conexion->query("SELECT * FROM entradas order by idunic desc");
}
// Variable de control para validar en que modo de búsqueda está esta se utiliza en el input type hidden
if(isset($_POST['control'])){
    $control = $_POST['control'];
}
else{
    $control = 0;
}
?>