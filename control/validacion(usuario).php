<?php
@session_start();
if(@$_SESSION['rango'] == 0){
    header("Location: ../pnf(usuario)/$redireccion");
}
?>