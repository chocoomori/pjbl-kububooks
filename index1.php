<?php
require "koneksi.php";
$queryproduk = mysqli_query($con, "SELECT id, nama, harga, foto, detail FROM produk LIMIT 8");

?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>toko online home</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<?php require "navabar1.php";?>

<!--banner-->
<div class="container-fluid banner d-flex align-items-center">
    <div class="container text-center text-white">
        <h1> kububooks</h1>
        <h3>mau cari apa?</h3>

        <div class="col-md-8 offset-md-2">
            <form method="get" action="produk.php">
        <div class="input-group input-group-lg my-4">
  <input type="text" class="form-control" placeholder="nama produk" aria-label="Recipient's username" aria-describedby="basic-addon2" name="keyword">
  <button type="submit" class="btn warna2 text-white">telusuri</button>
</div>
</form>
        </div>
    </div>
</div>
<!-- hightlighted-->
<div class="container-fluid py-5">
    <div class="container text-center">
        <h3>kategori terlaris</h3>

        <div class="row mt-5 d-flex justify-content-center">
    <div class="col-md-3 mb-3 ">
        <div class="highlighted-kategori kategori-novel d-flex justify-content-center align-items-center">
            <h4 class="text-white"><a class="no-decoration" href="produk.php?kategori=novel">novel</a></h4>
        </div>
    </div>
    <div class="col-md-3 mb-3">
        <div class="highlighted-kategori kategori-komik d-flex justify-content-center align-items-center">
        <h4 class="text-white"><a class="no-decoration" href="produk.php?kategori=komik">komik</a></h4>
        </div>
    </div>
    <div class="col-md-3 mb-3">
        <div class="highlighted-kategori kategori-buku-anak d-flex justify-content-center align-items-center">
        <h4 class="text-white"><a class="no-decoration" href="produk.php?kategori=bukuanak">buku anak</a></h4>
        </div>
    </div>
</div>

        </div>
    </div>
</div>


<!--produk-->
<div class="container-fluid py-5">
    <div class="container text-center">
        <h3>Produk</h3>

        <div class="row">
            <?php while($data = mysqli_fetch_array($queryproduk)){ ?>
        <div class="col-sm-6 col-md-3 mb-4">
                <div class="card h-100">
                    <div class="image-box">
                    <img src="image/<?php echo $data['foto']; ?>" class="card-img-top" alt="...">
                    </div>
                    <div class="card-body">
                        <h4 class="card-title text-truncate"><?php echo $data['nama']; ?></h4>
                        <p class="card-text text-truncate"><?php echo $data['detail'];?></p>
                        <p class="card-text text-harga">Rp.<?php echo $data['harga']; ?></p>
                        <a href="produk-detail.php?phpnama=<?php echo $data['id'];?>" class="btn warna2 text-white">lihat detail</a>
                    </div>
                </div>
            </div>
             <?php } ?>
            
           
       <div>
        <a class="btn btn-outline-primary mt-3 p-3 fs-3" href="produk.php">see more</a>
       </div>
</div>


<!--footer-->
<?php require "footer.php"; ?>
<script src="bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="fontawesome/js/all.min.js"></script>
</body>
</html>