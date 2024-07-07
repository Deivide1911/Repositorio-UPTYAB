<?php
session_start();
if(@$_SESSION['sesion'] == 0){
    header("Location: ../index.php");
}
?>