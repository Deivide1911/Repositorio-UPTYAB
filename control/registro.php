<?php 
$conexion = mysqli_connect("localhost","root","","proyectosdbnew");
if(isset($_POST['btn'])){
    if(strlen($_POST['pnombre']) > 1 && strlen($_POST['snombre']) > 1 && strlen($_POST['papellido']) > 1 && strlen($_POST['sapellido']) > 1 && strlen($_POST['fecha']) > 1 && strlen($_POST['ci']) > 1 && strlen($_POST['contrasena']) && isset($_POST['sexo'])){
            $pnombre = ucfirst(trim($_POST['pnombre']));
            $snombre = ucfirst(trim($_POST['snombre']));
            $papellido = ucfirst(trim($_POST['papellido']));
            $sapellido = ucfirst(trim($_POST['sapellido']));
            $fecha = trim($_POST['fecha']);
            $ci = trim($_POST['ci']);
            $sexo = trim($_POST['sexo']);
            $contraseña = trim($_POST['contrasena']);
            $consulta = "INSERT INTO usuario(id, contraseña) VALUES ('$ci','$contraseña')";
            $consulta2 = "INSERT INTO usuarioinformacion(usuarioinfoid,primernombre,segundonombre,primerapellido,segundoapellido,sexo,fecha ) VALUES ('$ci','$pnombre','$snombre','$papellido','$sapellido','$sexo','$fecha')";
            $res = mysqli_query($conexion,$consulta);
            $res2 = mysqli_query($conexion,$consulta2);
            header('Location: ../pnf/msj.html');
    }
    else{
        echo "<p class='text3'>Faltan datos</p>";
    }
}
?>