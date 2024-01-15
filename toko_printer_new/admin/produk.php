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

$produk = query("SELECT * FROM produk");


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Produk</title>
</head>
<body>

    <?php require '../layouts/sidebar.php'; ?>

    <div class="content">
        <h3>Data Produk - Toko Printer</h3>

        <a href="tambah_produk.php">Tambah</a>

        <table border="1" cellpadding="10" cellspacing="0">
            <tr>
                <th>No.</th>
                <th>Nama Lengkap</th>
                <th>Harga</th>
                <th>Foto</th>
                <th>Stok</th>
                <th>Deskripsi</th>
                <th>Opsi</th>
            </tr>

            <?php $no = 1; ?>
            <?php foreach($produk as $data) : ?>
            <tr>
                <td><?= $no; ?></td>
                <td><?= $data["nama_produk"]; ?></td>
                <td>Rp. <?= number_format($data["harga"]); ?></td>
                <td><img src="../assets/images/<?= $data["foto"]; ?>" width="100"></td>
                <td><?= $data["stok"]; ?></td>
                <td><?= $data["deskripsi"]; ?></td>
                <td>
                    <a href="edit_produk.php?id=<?= $data["id_produk"] ?>" class="edit">Edit</a>
                    <a href="hapus_produk.php?id=<?= $data["id_produk"]; ?>" class="hapus" onClick="return confirm('Anda yakin ingin menghapus?')">Hapus</a>
                </td>
            </tr>
            <?php $no++; ?>
            <?php endforeach; ?>
        </table>
        
    </div>

    <a href="../logout.php" onClick="return confirm('Apakah anda yakin ingin logout?')">Logout</a>
</body>
</html>