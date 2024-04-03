<?php
include "koneksi.php";
session_start();

if(!isset($_SESSION['userid'])){
    header("location:index.php");
}else{
    $fotoid=$_GET['fotoid'];
    $userid=$_SESSION['userid'];
    
    $sql=mysqli_query($koneksi, "SELECT * from dislike where fotoid='$fotoid' and userid='$userid'");

    if(mysqli_num_rows($sql)==1){
        header("location:index.php");
    }else{
        $tgldislike=date("Y-m-d");
            mysqli_query($koneksi,"INSERT into dislike values('','$fotoid','$userid','$tgldislike')");
            header("location:index.php");
    }
}
?>