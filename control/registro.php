<?php 
include("conexion.php");
if($conexion){
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
            $consulta = "INSERT INTO usuario(id, contraseña,rango) VALUES ('$ci','$contraseña',0)";
            $consulta2 = "INSERT INTO usuarioinformacion(usuarioinfoid,primernombre,segundonombre,primerapellido,segundoapellido,sexo,fecha ) VALUES ('$ci','$pnombre','$snombre','$papellido','$sapellido','$sexo','$fecha')";
            $res = mysqli_query($conexion,$consulta);
            $res2 = mysqli_query($conexion,$consulta2);
            header('Location: msj.html');
    }
    else if (empty($_POST['sexo'])){
        echo "<p style=color:red; class=text3>Debe elegir su sexo!</p>"; 
    }
    else{
        echo "<p class=text3>Debes rellenar todos los campos!</p>";
    }
}
}
else{
    echo "No se pudo conectar con la base de datos";
}
?>