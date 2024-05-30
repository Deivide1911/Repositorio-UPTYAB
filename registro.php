<?php 
$conexion = mysqli_connect("localhost","root","","proyectosdb");
if(isset($_POST['btn'])){
    if(strlen($_POST['pnombre']) > 1 && strlen($_POST['snombre']) > 1 && strlen($_POST['papellido']) > 1 && strlen($_POST['sapellido']) > 1 && strlen($_POST['fecha']) > 1 && strlen($_POST['ci']) > 1 && strlen($_POST['contrasena']) && isset($_POST['sexo'])){
            $pnombre = ucfirst(trim($_POST['pnombre']));
            $snombre = ucfirst(trim($_POST['snombre']));
            $papellido = ucfirst(trim($_POST['papellido']));
            $sapellido = ucfirst(trim($_POST['sapellido']));
            $fecha = trim($_POST['fecha']);
            $ci = trim($_POST['ci']);
            $sexo = trim($_POST['sexo']);
            $contrasena = trim($_POST['contrasena']);
            $consulta = "INSERT INTO registro(pnombre, snombre, papellido, sapellido, ci, sexo, fecha, contrasena) VALUES ('$pnombre','$snombre','$papellido','$sapellido','$ci','$sexo','$fecha','$contrasena')";
            $res = mysqli_query($conexion,$consulta);
            header('Location: msj.html');
    }
    else{
        echo "<p class='text3'>Faltan datos</p>";
    }
}
?>