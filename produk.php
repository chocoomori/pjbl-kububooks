<?php
require "koneksi.php";

$querykategori = mysqli_query($con, "SELECT * FROM kategori");

// get produk keyword
if(isset($_GET['keyword'])){
    $keyword = mysqli_real_escape_string($con, $_GET['keyword']);
    $queryproduk = mysqli_query($con, "SELECT * FROM produk WHERE id LIKE '%$keyword%'");
}
// get produk kategori
else if(isset($_GET['kategori'])){
    $kategori_id = mysqli_real_escape_string($con, $_GET['kategori']);
    $queryproduk = mysqli_query($con, "SELECT * FROM produk WHERE kategori_id = '$kategori_id'");
}
// get produk default
else {
    $queryproduk = mysqli_query($con, "SELECT * FROM produk");
}
$countdata = mysqli_num_rows($queryproduk);
echo $countdata;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>toko online produk</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php require "navabar1.php"?>

    <!--banner-->
    <div class="container-fluid banner d-flex align-items-center">
        <div class="container">
            <h1 class="text-white text-center">produk</h1>
        </div>
    </div>

    <!--body-->
    <div class="container py-5">
        <div class="row">
            <div class="col-lg-3 mb-5">
                <h3>kategori</h3>
            <ul class="list-group">
<?php while($kategori = mysqli_fetch_array($querykategori)){?>
    <a class="no-decoration" href="produk.php?kategori=<?php echo $kategori['id']?>">
  <li class="list-group-item"><?php echo $kategori['nama']; ?></li>
  </a>
    <?php } ?>
</ul>
            </div>
            <div class="col-lg-9">
                <h3 class="text-center mb-3">produk</h3>
                <div class="row">
                   <?php while($produk = mysqli_fetch_array($queryproduk)){?> 
                    <div class="col-md-4 mb-5">
                    <div class="card h-100">
                    <div class="image-box">
                    <img src="image/<?php echo $produk['foto'];?>" class="card-img-top" alt="...">
                    </div>
                    <div class="card-body">
                        <h4 class="card-title text-truncate"><?php echo $produk['nama'];?></h4>
                        <p class="card-text text-truncate"><?php echo $produk['detail'];?></p>
                        <p class="card-text text-harga">Rp.<?php echo $produk['harga'];?></p>
<a href="produk-detail.php?nama=<?php echo $produk['id'];?>" class="btn warna2 text-white">lihat detail</a>


                    </div>
                </div>
               </div>
               <?php } ?>

                
               
                    </div>
                </div>
            </div>
        </div>
    </div>

    
<script src="bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="fontawesome/js/all.min.js"></script>
</body>
</html>