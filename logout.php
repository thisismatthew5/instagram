<?php
session_start();
if(isset($_SESSION['userid'])){
    unset($_SESSION['userid']);
    header("location:login.php");
    die;
}
?>