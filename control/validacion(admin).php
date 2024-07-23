<?php
@session_start();
if(@$_SESSION['rango'] == 1){
    header("Location: ../pnf/$redireccion");
}
?>