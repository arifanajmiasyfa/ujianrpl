<?php 
include 'config/header.php' 
    ?>
<body>
     <?php
            include "koneksi.php";
            $sql=mysqli_query($koneksi,"SELECT * from foto,user where foto.userid=user.userid and status='1'");


            while($data=mysqli_fetch_array($sql)){
                $fotoid=$data['fotoid'];
                $like=mysqli_query($koneksi, "select * from likefoto where fotoid=$fotoid");
                $komentar=mysqli_query($koneksi, "select * from komentarfoto where fotoid=$fotoid");
    

        ?>
        <div class="container mx-auto mt-4">
            <div class="row">
                <div class="col">
                <div class="card" style="width: 18rem;">
                <a href="zoom.php?fotoid=<?=$data['fotoid']?>"><img src="gambar/<?=$data['lokasifile']?>" class="card-img-top rounded" alt="..."></a>
                <div class="card-body">
                    <h5 class="card-title"><?=$data['judulfoto']?></h5>
                    <p class="card-text"><?=$data['namalengkap']?></p>
                    <a href="like.php?fotoid=<?=$data['fotoid']?>"><i class="bi bi-heart-fill"></i><?=mysqli_num_rows($like)?></a>
                    <a href="komentar.php?fotoid=<?=$data['fotoid']?>"><i class="bi bi-chat"></i><?=mysqli_num_rows($komentar)?></a>
                </div>
                </div>
                </div>
            </div>
        </div>
    <?php 
            }
    ?>
</body>
</html>
