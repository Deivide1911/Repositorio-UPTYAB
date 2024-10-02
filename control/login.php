<?php
include("conexion.php");
if($conexion){
    if(isset($_POST['btn'])){
        $id = $_POST['id'];
        $contraseña = $_POST['contraseña'];
        $consulta = $conexion ->query("SELECT * FROM usuario where id='$id' and contraseña='$contraseña' and rango = 0");
        $consulta_admin = $conexion ->query("SELECT * FROM usuario where id='$id' and contraseña='$contraseña' and rango=1");
        if($consulta->fetch_object()){
                $select = $conexion->query("SELECT * FROM usuarioinformacion where usuarioinfoid='$id'");
                $mostrar = mysqli_fetch_array($select);
                $nombre = $mostrar['primernombre'];
                $apellido = $mostrar['primerapellido'];
                date_default_timezone_set("America/Caracas");
                $hora = date("H:i:s");
                $fecha = date("Y-m-d");
                $reporte = $conexion->query("INSERT INTO entradas (id,hora,fecha,nombre,apellido) values ('$id','$hora','$fecha','$nombre','$apellido')");
                session_start();
                $_SESSION['sesion'] = 1;
                $_SESSION['rango'] = 0;
                $_SESSION['id'] = $id;
                header("Location: ./pnf(usuario)/main(usuario).php");
        }
        else if ($consulta_admin->fetch_object()){
            $select = $conexion->query("SELECT * FROM usuarioinformacion where usuarioinfoid='$id'");
            $mostrar = mysqli_fetch_array($select);
            $nombre = $mostrar['primernombre'];
            $apellido = $mostrar['primerapellido'];
            date_default_timezone_set("America/Caracas");
            $hora = date("H:i:s");
            $fecha = date("Y-m-d");
            $reporte = $conexion->query("INSERT INTO entradas (id,hora,fecha,nombre,apellido) values ('$id','$hora','$fecha','$nombre','$apellido')");
            session_start();
            $_SESSION['sesion'] = 1;
            $_SESSION['rango'] = 1;
            $_SESSION['id'] = $id;
            header("Location: ./pnf/main.php");
        }
        else{
            echo "<p class='error' style=position:absolute color:red;>Datos Incorrectos!</p>";
        }
}
}
else{
    echo "<p style=color:red;>No se pudo establecer conexión con la base de datos!</p>";
}
?>