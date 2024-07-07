<?php 
$conexion = mysqli_connect("localhost","root","12345678","proyectosdbnew");
if($conexion){
    if(isset($_POST['btn'])){
        $id = $_POST['id'];
        $contraseña = $_POST['contraseña'];
        $consulta = $conexion ->query("SELECT * FROM usuario where id='$id' and contraseña='$contraseña'");
        $consu = $conexion ->query("SELECT * FROM usuario where id='$id' and rango=0");
        $sql = $conexion -> query("SELECT * from usuario where id='$id'");
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