<?php 
$conexion = mysqli_connect("localhost","root","","proyectosdbnew");
if($conexion){
    if(isset($_POST['btn'])){
        $id = $_POST['id'];
        $contraseña = $_POST['contraseña'];
        $consulta = $conexion ->query("SELECT * FROM usuario where id='$id' and contraseña='$contraseña'");
        if($consulta->fetch_object()){
                $rango_consulta = $conexion->query("SELECT * FROM usuario where id='$id' and rango=0");
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
                    header("Location: ../pnf/main.php");
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