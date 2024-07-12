<?php 
$conexion = mysqli_connect("localhost","root","","proyectosdbnew");
if(isset($_POST['btn'])){
    $archivo = $_FILES['file']['name'];
    $ruta_tmp = $_FILES['file']['tmp_name'];
    $ruta = "../proyectos/".$archivo;
    $titulo = $_POST['titulo'];
    $trayecto = $_POST['trayecto'];
    $tipoproyecto = $_POST['tipoproyecto'];
    $autores = $_POST['autores'];
    $etiquetas = $_POST['etiquetas'];
    $pnf = $_POST['pnf'];
    move_uploaded_file($ruta_tmp,$ruta);
    $consulta = $conexion->query("INSERT INTO informatica (titulo,tipoproyecto,archivo,etiquetas,autores,trayecto,ruta) values ('$titulo','$tipoproyecto','$archivo','$etiquetas','$autores','$trayecto','$ruta')");
    header("Location: felicidades.html");
}
else{
    echo "No se ha enviado ninguna consulta!";
}
?>  