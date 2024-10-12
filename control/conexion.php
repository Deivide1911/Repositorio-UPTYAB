<?php
$conexion = mysqli_connect("localhost","root","","repositorio");
if($conexion){

}
else{
    echo "<p style=color:red;>No se pudo establecer conexión con la base de datos!</p>";
}
?>