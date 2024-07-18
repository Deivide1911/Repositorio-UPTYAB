<?php 
include("../control/conexion.php");
if($conexion){
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
        $verificar_archivo =  $conexion->query("SELECT * FROM $pnf where archivo = '$archivo'");        
        if(empty($titulo) || empty($autores)|| empty($etiquetas) || empty($pnf)){
            echo "<p style=color:red;>Debes rellenar todos los datos!</p>";
        }
        else if(empty($archivo) || empty($ruta_tmp) ){
            echo "<p style=color:red;>Debes adjuntar un archivo PDF!</p>";
        }    
        else if ($verificar_archivo->fetch_object()){
            echo "<p style='color:red; font-weight:bold;'>Cambia el nombre del archivo para poder continuar!</p>";
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
}
else{
    echo "No se obtuvo conexión con la base de datos";
}
?>  