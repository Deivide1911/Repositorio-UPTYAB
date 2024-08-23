<?php 
include("../control/conexion.php"); 
$redireccion = "../pnf(usuario)/main(usuario).php";
include("../control/validacion(usuario).php");
$consulta = $conexion->query("SELECT * FROM usuario");
$consulta2 = $conexion->query("SELECT * FROM usuarioinformacion");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de usuarios</title>
</head>
<body>
    <table>
        <tr>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>C.I</th>
            <th>Admin</th>
        </tr>
        <?php 
        while($mostrar = mysqli_fetch_array($consulta2) && $mostrar2 = mysqli_fetch_array($consulta)){
        ?>
        <tr>
            <td><?php echo $mostrar['primernombre']; ?></td>
            <td><?php echo $mostrar['primerapellido'] ?></td>
            <td><?php echo $mostrar['usuarioinfoid'] ?></td>
            <td><?php if($mostrar2['rango'] == 0){
                echo "No"; } else{echo "Si";} ?></td>
        </tr>
        <?php 
      }
    ?>
    </table>
</body>
</html>