<?php
    session_start();
    if(!isset($_SESSION['userid'])){
        header("location:login.php");
    }
?>

    <form action="tambah_komentar.php" method="post">
        <?php
            include "koneksi.php";
            $fotoid=$_GET['fotoid'];
            $sql=mysqli_query($koneksi,"SELECT * from foto where fotoid='$fotoid'");
            while($data=mysqli_fetch_array($sql)){
        ?>
        <input type="text" name="fotoid" value="<?=$data['fotoid']?>" hidden>
        <table>
            <tr>
                <td>Judul</td>
                <td><input type="text" name="judulfoto" value="<?=$data['judulfoto']?>"></td>
            </tr>
            <tr>
                <td>Deskripsi</td>
                <td><input type="text" name="deskripsifoto" value="<?=$data['deskripsifoto']?>"></td>
            </tr>
            <tr>
                <td>Foto</td>
                <td><img src="gambar/<?=$data['lokasifile']?>" width="200px"></td>
            </tr>
            <tr>
                <td>Komentar</td>
                <td><input type="text" name="isikomentar"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="Tambah"></td>
            </tr>
        </table> 
        <?php
            }
        ?>
    

    <table width="100%" border="1" cellpadding=5 cellspacing=0>
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>Komentar</th>
            <th>Tanggal</th>
        </tr>
        <?php
            include "koneksi.php";
            $userid=$_SESSION['userid'];
            $sql=mysqli_query($koneksi,"SELECT * from komentarfoto user where komentarfoto.komentarfoto='$komentarfoto' and user.userid='$userid'");
            while($data=mysqli_fetch_array($sql)){
        ?>
            <tr>
                <td><?=$data['komentarid']?></td>
                <td><?=$data['namalengkap']?></td>
                <td><?=$data['isikomentar']?></td>
                <td><?=$data['tanggalkomentar']?></td>
            </tr>
        <?php
            }
        ?>
    </table>
    </form>
</body>
</html>