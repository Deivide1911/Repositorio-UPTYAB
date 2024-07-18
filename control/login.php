<?php
include("conexion.php");
if($conexion){
    if(isset($_POST['btn'])){
        $id = $_POST['id'];
        $contraseña = $_POST['contraseña'];
        $consulta = $conexion ->query("SELECT * FROM usuario where id='$id' and contraseña='$contraseña'");
        if($consulta->fetch_object()){
                $rango_consulta = $conexion->query("SELECT * FROM usuario where id='$id' and rango=0");
                $rango_consulta2 = $conexion->query("SELECT * FROM usuario where id='$id' and rango=1");
                $select = $conexion->query("SELECT * FROM usuarioinformacion where usuarioinfoid='$id'");
                $mostrar = mysqli_fetch_array($select);
                $nombre = $mostrar['primernombre'];
                $apellido = $mostrar['primerapellido'];
                date_default_timezone_set("America/Caracas");
                $hora = date("H:i:s");
                $fecha = date("Y-m-d");
                $reporte = $conexion->query("INSERT INTO entradas (id,hora,fecha,nombre,apellido) values ('$id','$hora','$fecha','$nombre','$apellido')");
                if($rango_consulta->fetch_object()){
                    session_start();
                    $_SESSION['sesion'] = 1;
                    $_SESSION['rango'] = 1;
                    header("Location: ../pnf/main.php");
                }
                else if($rango_consulta2->fetch_object()){
                    echo "<p style=color:red;>En construcción rango usuario!</p>";
                }
        }
        else{
            echo "<p style=color:red;>Datos Incorrectos!</p>";
        }
}
}
else{
    echo "<p style=color:red;>No se pudo establecer conexión con la base de datos!</p>";
}
?>