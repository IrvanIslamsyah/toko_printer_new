<?php
session_start();
require 'functions.php';

if(!isset($_SESSION["username"])){
    echo "
    <script type='text/javascript'>
        alert('Silahkan login terlebih dahulu, ya!');
        window.location = '../auth/login/index.php';
    </script>
    ";
}

if(isset($_POST["tambah"])){
    if(tambahProduk($_POST) > 0 ){
        echo "
            <script type='text/javascript'>
                alert('Yay! data berhasil ditambahkan');
                window.location = 'produk.php';
            </script>
        ";
    }else{
        echo "
            <script type='text/javascript'>
                alert('Yahh data gagal ditambahkan');
                window.location = 'produk.php';
            </script>
        ";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Poduk</title>
</head>
<body>

    <div class="content">
        <h3>Tambah Data Produk - Toko Printer</h3>
        <form action="" method="post" enctype="multipart/form-data">
            <label for="nama_produk">Nama Produk</label>
            <input type="text" name="nama_produk" id="nama_produk" class="form-control"><br><br>

            <label for="harga">Harga</label>
            <input type="number" name="harga" id="harga" class="form-control"><br><br>

            <label for="foto">Foto</label>
            <input type="file" name="foto" id="foto" class="form-control"><br><br>

            <label for="stok">Stok</label>
            <input type="number" name="stok" id="stok" class="form-control"><br><br>

            <label for="deskripsi">Deskripsi</label>
            <textarea name="deskripsi" id="deskripsi" cols="30" rows="10"></textarea>

            <button type="submit" name="tambah">Tambah</button>
        </form>
    </div>
</body>
</html>