<?php 

session_start();
if(!isset($_SESSION['userid'])){
    header("location:login.php");
}
    include "config/header.php";
    include "config/footer.php";
?>