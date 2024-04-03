<?php
$fotoid=$_GET['fotoid'];
include 'koneksi.php';

mysqli_query($koneksi, "update foto set status='0' where fotoid='$fotoid'");

echo "<script>window.location.href='foto.php'</script>";


?>