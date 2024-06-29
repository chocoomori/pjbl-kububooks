<?php
require "koneksi.php";

$nama = htmlspecialchars($_GET['nama']);
$queryproduk = mysqli_query($con, "SELECT * FROM produk WHERE nama LIKE '%$nama%'");
$produk = mysqli_fetch_array($queryproduk);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>toko online detail produk</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<?php require "navabar1.php"?>

<div class="container-fluid py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                <img src="image/<?php echo $produk['foto']; ?>" class="w-100" alt="">
            </div>
            <div class="col-md-7">
                <div class="row">
                    <div class="col-md-8">
                        <h1><?php echo $produk['nama'];?></h1>
                        <p class="fs-5"><?php echo $produk['detail'];?></p>
                    </div>
                        <p class="text-harga">Rp.<?php echo $produk['harga'];?></p>
                        <p fs-5> status ketersediaan :<strong> <?php echo $produk['ketersediaan_stok'];?></p>
                </div>
            </div>
        </div>
    </div>
</div>


    
<script src="bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="fontawesome/js/all.min.js"></script>
</body>
</html>