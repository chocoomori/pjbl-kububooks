<?php
   require "session.php";
   require "../koneksi.php";

   $querykategori = mysqli_query($con, "SELECT * FROM kategori");
   $jumlahkategori = mysqli_num_rows($querykategori);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>kategori</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../fontawesome/css/fontawesome.min.css">
</head>

<style>
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
    <a href="../adminpanel" class="no-decoration text-muted">
        <i class="fa-solid fa-house"></i>  Home</a>
    </li>
    <li class="breadcrumb-item active" aria-current="page">
    <i class="fa-solid fa-bars"></i>  kategori
    </li>
  </ol>
</nav>
<div class="my-5 col-12 col-md-6">
    <h3>Tambah kategori</h3>

    <form action="" method="post">
        <div>
            <label for="kategori">kategori</label>
            <input type="text" id="kategori" name="kategori" placeholder="input nama kategori" class="form-control">
        </div>
        <div class="mt-3">
    <button class="btn btn-primary mt-3" type="submit" name="simpan_kategori">simpan</button>
</div>
    </form>

    <?php
    if(isset($_POST['simpan_kategori'])){
        $kategori = htmlspecialchars($_POST['kategori']);

        $queryExist = mysqli_query($con, "SELECT nama FROM kategori WHERE nama='$kategori'");
        $JumlahDataKategoriBaru = mysqli_num_rows($queryExist);


        if($JumlahDataKategoriBaru > 0){
            ?>
            <div class="alert alert-warning" mt-3 role="alert">
                      kategori sudah ada
               </div>
            <?php
        }
        else{
           $querySimpan = mysqli_query($con, "INSERT INTO kategori (nama) VALUES('$kategori')");
           if($querySimpan){
               ?>
               <div class="alert alert-primary mt-3" role="alert">
                   kategori berhasil tersimpan
               </div>

               <meta http-equiv="refresh" content="2; url=kategori.php" />
               <?php

           } else {
               echo mysqli_error($con);
           }
           
            }
        }
    
    ?>
</div>

<div class="mt-3">
    <h2>list kategori</h2>

    <div class="table-responsive mt-5">
    <table class="table">
        <thead>
            <tr>
                <th>No.</th>
                <th>Nama</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>        
            <?php
            if($jumlahkategori == 0){
                echo "<tr>
                        <td colspan='3' class='text-center'>data kategori tidak tersedia</td>
                      </tr>";
            } else {
                $jumlah = 1;
                
                while($data = mysqli_fetch_array($querykategori)){
                    echo "<tr>
                            <td>".$jumlah."</td>
                            <td>".$data['nama']."</td>
                            <td>
                                <a href='kategori-detail.php?p=".$data['id']."' class='btn btn-info'><i class='fa-solid fa-magnifying-glass'></i></a>
                            </td>
                          </tr>";
                     $jumlah++;
                }
            }
            ?>
        </tbody>
    </table>
</div>

    </div>
</div>
</div>
    
<script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../fontawesome/js/all.min.js"></script>
</body>
</html>