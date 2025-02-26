<?php
   require "session.php";
   require "../koneksi.php";

   $querykategori = mysqli_query($con, "SELECT * FROM kategori");
   $jumlahkategori = mysqli_num_rows($querykategori);

   $queryproduk = mysqli_query($con, "SELECT * FROM produk");
   $jumlahproduk = mysqli_num_rows($queryproduk);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../fontawesome/css/fontawesome.min.css">
</head>

<style>
  .kotak{
    border: solid;
  }
  .summary-kategori{
    background-color: #0a6b4a;
    border-radius: 15px;
  }

  .summary-produk{
    background-color: #0a516b;
    border-radius: 15px;
    margin: 3%;
  }

  .no-decoration{
    text-decoration: none;
  }
</style>
<body>
    <?php require "navbar.php"; ?>
    <div class="container mt-5 ">
    <nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item active" aria-current="page">
    <i class="fa-solid fa-house"></i>  Home
    </li>
  </ol>
</nav>
    <h2>halo <?php echo $_SESSION['username']; ?></h2>

    <div class="container mt-5">
     <div class="col-lg-4">
      <div class="summary-kategori p-3">
       <div class="row">
        <div class="col-6">
        <i class="fa-solid fa-bars fa-7x text-black-50"></i>
        </div>
        <div class="col-6 text-white">
          <h3 class="fs-2">kategori</h3>
          <p class="fs-4"><?php echo $jumlahkategori; ?> kategori</p>
          <p><a href="kategori.php" class="text-white">lihat detail</a></p>
        </div>
       </div>
</div>
     </div>

     <div class="col-lg-4">
      <div class="summary-produk p-3">
       <div class="row">
        <div class="col-6">
        <i class="fa-solid fa-cart-flatbed fa-7x text-black-50"></i>
        </div>
        <div class="col-6 text-white">
          <h3 class="fs-2">produk</h3>
          <p class="fs-4"><?php echo $jumlahproduk; ?> produk</p>
          <p><a href="produk.php" class="text-white">lihat detail</a></p>
        </div>
       </div>
    </div>
    </div>
    </div>

<script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../fontawesome/js/all.min.js"></script>
</body>
</html>