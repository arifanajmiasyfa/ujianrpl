<?php
session_start();
if(!isset($_SESSION['userid'])){
    header("location:login.php");
}
include "config/header.php";

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Album</title>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <div class="card mt-2">
                <div class="card-header">Tambah Album</div>
                <div class="card-body">
                    <form action="tambah_album.php" method="POST">
                        <label class="form-label">Nama Album</label>
                        <input type="text" name="namaalbum" class="form-control" required>
                        <label class="form-label">Deskripsi</label>
                        <textarea name="deskripsi" class="form-control" required></textarea>
                        <button type="submit" class="btn btn-primary mt-2" name="tambah">Tambah</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card mt-2">
                <div class="card-header">Data album</div>
                <div class="card-body">
                    <table class="table ">
                        <thead class="table">
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Deskripsi</th>
                                <th>Tanggal Dibuat</th>
                                <th>Aksi</th>
                            </tr>
                            <?php
                            include "koneksi.php";
                            $no=1;
                            $userid=$_SESSION['userid'];
                            $sql=mysqli_query($koneksi,"SELECT * from album where userid='$userid'");
                            while($data=mysqli_fetch_array($sql)){
                            ?>
                        </thead>
                        <tbody>
                            <td><?=$no++?></td>
                            <td><?=$data['namaalbum']?></td>
                            <td><?=$data['deskripsi']?></td>
                            <td><?=$data['tanggaldibuat']?></td>
                            <td>
                                <a onclick="return confirm('Apakah anda yakin akan menghapus data')" href="hapus_album.php?albumid=<?=$data['albumid']?>" class="bi bi-trash"></a>
                                <a href="edit_album.php?albumid=<?=$data['albumid']?>"class="bi bi-pencil-square"></a>
                            </td>
                        </tbody>
                        <?php
                            }
                        ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
