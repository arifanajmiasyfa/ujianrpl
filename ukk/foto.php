<?php
    session_start();
    if(!isset($_SESSION['userid'])){
        header("location:login.php");
    }
    include "config/header.php";
?>



<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="card mt-2">
                <div class="card-header">Tambah Foto</div>
                <div class="card-body">
                        <form action="tambah_foto.php" method="post" enctype="multipart/form-data">
        <table>
            <label class="form-label">Judul Foto</label>
            <input type="text" name="judulfoto" class="form-control" required>
            <label class="form-label"> Deskripsi</label>
            <input type="text" name="deskripsi" class="form-control" required>
            <tr>
                <td class>Lokasi File</td>
                <td><input type="file" name="lokasifile"></td>
            </tr>
            <tr>
                <td>Album</td>
                <td>
                    <select name="albumid">
                    <?php
                        include "koneksi.php";
                        $userid=$_SESSION['userid'];
                        $sql=mysqli_query($koneksi,"SELECT * from album where userid='$userid'");
                        while($data=mysqli_fetch_array($sql)){
                    ?>
                            <option value="<?=$data['albumid']?>"><?=$data['namaalbum']?></option>
                    <?php
                        }
                    ?>
                    </select>
                    
                </td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="Tambah"></td>
            </tr>
        </table>
    </form>

                </div>
            </div>
        </div>
        <div class="col">
            <div class="card mt-2">
                <div class="card-header">Data Foto</div>
                <div class="card-body">
                    <table class="table ">
                        <thead class="table">
                            <tr>
            <th>No</th>
            <th>Judul</th>
            <th>Deskripsi</th>
            <th>Tanggal Unggah</th>
            <th>Lokasi File</th>
            <th>Album</th>
            <th>Like</th>
            <th>Dislike</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>
        <?php
            include "koneksi.php";
            $no = 1;
            $userid=$_SESSION['userid'];
            $sql=mysqli_query($koneksi,"SELECT * from foto,album where foto.userid='$userid' and foto.albumid=album.albumid");
            while($data=mysqli_fetch_array($sql)){
        ?>
                        </thead>
                    <tbody>
                        <tr>
                    <td><?=$no++?></td>
                    <td><?=$data['judulfoto']?></td>
                    <td><?=$data['deskripsifoto']?></td>
                    <td><?=$data['tanggalunggah']?></td>
                    <td>
                        <img src="gambar/<?=$data['lokasifile']?>" width="200px">
                    </td>
                    <td><?=$data['namaalbum']?></td>
                    <td>
                        <?php
                            $fotoid=$data['fotoid'];
                            $sql2=mysqli_query($koneksi,"select * from likefoto where fotoid='$fotoid'");
                            echo mysqli_num_rows($sql2);
                        ?>
                    </td>
                    <td><?= $data['status'] ?></td>
                    <td>
                    <?php
                            $fotoid=$data['fotoid'];
                            $sql2=mysqli_query($koneksi,"SELECT * FROM dislike where fotoid='$fotoid'");
                            echo mysqli_num_rows($sql2);
                    ?>
                    </td>
                    <td>
                    <a onclick="return confirm('Apakah anda yakin akan menghapus data')" href="hapus_foto.php?fotoid=<?=$data['fotoid'] ?>" class="bi bi-trash"></a>
                        <a href="edit_foto.php?fotoid=<?=$data['fotoid']?>" class="bi bi-pencil-square"></a>
                        <?php 
                        $status = mysqli_query($koneksi, "SELECT * FROM foto WHERE fotoid='$fotoid'");
                        $unpublic = mysqli_fetch_array($status);{
                            if ($unpublic['status'] == 1){
                                echo '<a href="unpublic.php?fotoid=' . $data['fotoid'] . '" class="btn btn-secondary">unpublic</a>';
                            } else {
                                echo '
                                <a href="public.php?fotoid=' . $data['fotoid'] . '" class="btn btn-success">public</a>';
                            }
                        }
                        ?>
                    </td>
                </tr>
        <?php
            }
        ?>
                    </tbody>
                        
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
