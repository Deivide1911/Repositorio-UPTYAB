<?php
@session_start();
if(@$_SESSION['sesion'] == 1 && @$_SESSION['rango'] == 1){
    header("Location: ./pnf/main.php");
}
else if (@$_SESSION['sesion'] == 1 && @$_SESSION['rango'] == 0){
    header("Location: ./pnf(usuario)/main(usuario).php");
}
?>