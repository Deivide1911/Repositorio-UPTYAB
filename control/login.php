<?php
include("conexion.php");
    if(isset($_POST['btn'])){
        $id = $_POST['id'];
        $contraseña = $_POST['contraseña'];
        $consulta = $conexion ->query("SELECT * FROM usuario where id='$id' and contraseña='$contraseña'");
        if ($consulta->num_rows > 0) {
            $mostrar = $consulta->fetch_assoc();
            $rango = $mostrar['rango'];
                if($rango == 0){
                $select = $conexion->query("SELECT * FROM usuarioinformacion where usuarioinfoid='$id'");
                $mostrar2 = mysqli_fetch_array($select);
                $nombre = $mostrar2['primernombre'];
                $apellido = $mostrar2['primerapellido'];
                date_default_timezone_set("America/Caracas");
                $hora = date("H:i:s");
                $fecha = date("Y-m-d");
                $reporte = $conexion->query("INSERT INTO entradas (id,hora,fecha,nombre,apellido) values ('$id','$hora','$fecha','$nombre','$apellido')");
                $idunic = $conexion->query("SELECT * FROM entradas WHERE id = '$id' and hora = '$hora' and fecha='$fecha'");
                $idunic_m=$idunic->fetch_assoc();
                session_start();
                $_SESSION['idunic'] = $idunic_m['idunic'];
                $_SESSION['sesion'] = 1;
                $_SESSION['rango'] = $rango;
                $_SESSION['id'] = $id;
                header("Location: ./pnf(usuario)/main(usuario).php");
                }
                else if ($rango == 1){
                    $rango = $mostrar['rango'];
                    $select = $conexion->query("SELECT * FROM usuarioinformacion where usuarioinfoid='$id'");
                    $mostrar2 = mysqli_fetch_array($select);
                    $nombre = $mostrar2['primernombre'];
                    $apellido = $mostrar2['primerapellido'];
                    date_default_timezone_set("America/Caracas");
                    $hora = date("H:i:s");
                    $fecha = date("Y-m-d");
                    $reporte = $conexion->query("INSERT INTO entradas (id,hora,fecha,nombre,apellido) values ('$id','$hora','$fecha','$nombre','$apellido')");
                    $idunic = $conexion->query("SELECT * FROM entradas WHERE id = '$id' and hora = '$hora' and fecha='$fecha'");
                    $idunic_m=$idunic->fetch_assoc();
                    session_start();
                    $_SESSION['idunic'] = $idunic_m['idunic'];
                    $_SESSION['sesion'] = 1;
                    $_SESSION['rango'] = $rango;
                    $_SESSION['id'] = $id;
                    header("Location: ./pnf/main.php");
                }
            }
            else{
                echo "<p class='error' style=position:absolute color:red;>Datos Incorrectos!</p>";
            }

        }




?>