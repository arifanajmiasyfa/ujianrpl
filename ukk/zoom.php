<?php
    include "config/header.php";

    $fotoid = $_GET['fotoid'];
?>

<?php
            include "koneksi.php";
            $sql=mysqli_query($koneksi,"SELECT * from foto inner join user on foto.userid=user.userid where foto.fotoid='$fotoid'");
            while($data=mysqli_fetch_array($sql)){
        ?>
    <div class="container mt-4">
    <div class="card mb-3 mt-4 m-3" >
  <div class="row g-0">
    <div class="col-md-4">
      <img src="gambar/<?=$data['lokasifile']?>" class="img-fluid rounded-start" alt="...">
    </div>
    <div class="col-md-5">
      <div class="card-body">
        <h5 class="card-title"><?=$data['judulfoto']?></h5>
        <p class="card-text"><?=$data['deskripsifoto']?></p>
        <p class="card-text"><?=$data['namalengkap']?></p>
        <p class="card-text"><small class="text-body-secondary"><?=$data['tanggalunggah']?></small></p>
      </div>
      <form action="proses_komentar.php" method="post">
        <div class="container m-4">
                <div class="mb-3">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Masukkan Komentar" aria-describedby="button-addon2" name="isikomentar" required>
                    <input type="hidden" class="form-control" name="fotoid" value="<?= $fotoid ?>">
                    <input type="hidden" class="form-control" name="userid" value="<?= $_SESSION['userid'] ?>">
                    <button class="btn btn-outline-secondary" type="submit">Kirim</button>
                </div>
                </div>
                    <div class="container text-center m-4">
                        <div class="row">
                            <div class="col ">
                            <a href="like.php?fotoid=<?= $data['fotoid']?>"><h5 class="bi bi-heart-fill "></h5></a>
                            </div>
                            <div class="col">
                            <a href="gambar/<?=$data['lokasifile']?>" download><h5 class="bi bi-download "></h5></a>
                            </div>
                            <div class="col">
                                <a href="dislike.php?fotoid=<?= $data['fotoid']?>"><h5 class="bi bi-hand-thumbs-down-fill "></h5></a>
                            </div>
                            <div class="col">
                            <a href="index.php"><h5 class="bi bi-arrow-left-circle btn btn-info"></h5></a>
                            </div>
                        </div>
                    </div>
                    <ul class="list-group">
                    <?php
                        include "koneksi.php";
                        $fotoid=$_GET['fotoid'];
                        $sql=mysqli_query($koneksi,"SELECT * from komentarfoto where fotoid=$fotoid");
                        while($data=mysqli_fetch_array($sql)){
                    ?>
                    <li class="list-group-item"><?=$data['isikomentar']?></li>
                    <?php
                        }
                    ?>
                    </ul>
                </div>
                </div>
            </form>
    </div>
  </div>
</div>
</div>
  <?php
    }
  ?>



<?php
    include "config/footer.php";
?>