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
    $verificacion = $conexion->query("SELECT * FROM $pnf where titulo = '$titulo' or archivo = '$archivo'");
        if($verificacion->fetch_object()){
            header("Location: alerta.php?tipoproyecto=$tipoproyecto&autores=$autores&trayecto=$trayecto&pnf=$pnf&titulo=$titulo&etiquetas=$etiquetas&tipoproyecto=$tipoproyecto&autores=$autores");
        }
        else{
            move_uploaded_file($ruta_tmp,$ruta);
            $consulta = $conexion->query("INSERT INTO $pnf (titulo,tipoproyecto,archivo,etiquetas,autores,trayecto,ruta,estado) values ('$titulo','$tipoproyecto','$archivo','$etiquetas','$autores','$trayecto','$ruta','Habilitado')");
            $consulta2 =$conexion->query("SELECT * FROM $pnf where titulo = '$titulo' and archivo = '$archivo'");
            $mostrar = mysqli_fetch_array($consulta2);
            $id = $mostrar['id'];
            $subiridproject = $conexion->query("INSERT INTO pnf (id,pnf) values ('$id','$pnf')");
            header("Location: felicidades.html");
        }
    }
else{
    echo "No se ha enviado ninguna consulta!";
}
?>  