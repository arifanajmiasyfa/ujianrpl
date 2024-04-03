<?php
    session_start();
    if(!isset($_SESSION['userid'])){
        header("location:login.php");
    }
    include "config/header.php";
    include "config/footer.php";

?>
<body>
    <div class="container">
        <div class="card m-4">
            <div class="card-header">Edit Album</div>
            <div class="card-body">
                <form action="update_album.php" method="post">
        <?php
            include "koneksi.php";
            $albumid=$_GET['albumid'];
            $sql=mysqli_query($koneksi,"SELECT * from album where albumid='$albumid'");
            while($data=mysqli_fetch_array($sql)){
        ?>
        <input type="text" name="albumid" value="<?=$data['albumid']?>" hidden>
        <table>
            <tr>
                <td>Nama Album</td>
                <td><input type="text" name="namaalbum" value="<?=$data['namaalbum']?>"></td>
            </tr>
            <tr>
                <td>Deskripsi</td>
                <td><input type="text" name="deskripsi" value="<?=$data['deskripsi']?>"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="Ubah"></td>
            </tr>
        </table>
        <?php
            }
        ?>
    </form>
            </div>
        </div>
    </div>
      
</body>
</html>