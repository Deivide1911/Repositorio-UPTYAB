<?php 
$conexion = mysqli_connect("localhost","root","","proyectosdb");
if($conexion){
    if(isset($_POST['btn'])){
        $ci = $_POST['ci'];
        $contrasena = $_POST['contrasena'];
        $consulta = $conexion ->query("SELECT * FROM registro where ci='$ci' and contrasena='$contrasena'");
        $consu = $conexion ->query("SELECT * FROM registro where ci='$ci' and rango=0");
        $sql = $conexion -> query("SELECT * from registro where ci='$ci'");
        $id = mysqli_fetch_array($sql);
        if($datos = $consulta->fetch_object()){
                header("Location: ../pnf/main.html");
                session_start();
                $_SESSION['sesion'] = 1;
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