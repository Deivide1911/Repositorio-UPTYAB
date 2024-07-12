<?php
@session_start();
if(@$_SESSION['sesion'] !== 1){
    header("Location: ../index.php");
}
?>