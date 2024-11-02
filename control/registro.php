<?php
include("conexion.php");
if (isset($_POST['btn'])) {
    if (strlen($_POST['pnombre']) >= 1 && strlen($_POST['papellido']) >= 1 && strlen($_POST['fecha']) >= 1 && strlen($_POST['ci']) >= 1 && strlen($_POST['contraseña']) >= 1 && isset($_POST['sexo'])) {
        $pnombre = ucfirst(trim($_POST['pnombre']));
        $snombre = ucfirst(trim($_POST['snombre']));
        $papellido = ucfirst(trim($_POST['papellido']));
        $sapellido = ucfirst(trim($_POST['sapellido']));
        $fecha = trim($_POST['fecha']);
        $ci = trim($_POST['ci']);
        $sexo = trim($_POST['sexo']);
        $contraseña = trim($_POST['contraseña']);
        try {
            $consulta = "INSERT INTO usuario(id, contraseña, rango) VALUES ('$ci','$contraseña',0)";
            $consulta2 = "INSERT INTO usuarioinformacion(usuarioinfoid, primernombre, segundonombre, primerapellido, segundoapellido, sexo, fecha) VALUES ('$ci','$pnombre','$snombre','$papellido','$sapellido','$sexo','$fecha')";
            mysqli_begin_transaction($conexion);
            $res = mysqli_query($conexion, $consulta);
            $res2 = mysqli_query($conexion, $consulta2);
            mysqli_commit($conexion);
            header('Location: msj.html');
        } catch (mysqli_sql_exception $e) {
            mysqli_rollback($conexion);
            if ($e->getCode() == 1062) { // Código de error para entrada duplicada
                echo "<p style='color:red; position:absolute;margin:auto;margin-left:70px;' class='text3'>Esta cédula de identidad ya está registrada!</p>";
            } else {
                echo "<p style='color:red;' class='text3'>Error: " . $e->getMessage() . "</p>";
            }
        }
    } else if (empty($_POST['sexo'])) {
        echo "<p style='color:red;' class='text3'>Debe elegir su sexo!</p>";
    } else {
        echo "<p style='color:red; position:absolute;margin:auto;margin-left:130px;'  class='text3'>Debes rellenar todos los campos!</p>";
    }
}
?>
