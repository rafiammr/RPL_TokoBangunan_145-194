

<?php
session_start();
include '../koneksi.php';

// Cek apakah keranjang belanja sudah dibuat
if (!isset($_SESSION['keranjang'])) {
    $_SESSION['keranjang'] = array();
}

// Fungsi untuk menghitung total harga barang di keranjang
function hitungTotalHarga() {
    $total_harga = 0;
    foreach ($_SESSION['keranjang'] as $barang) {
        $subtotal = $barang['harga_barang'] * $barang['jumlah_beli'];
        $total_harga += $subtotal;
    }
    return $total_harga;
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Aplikasi Kasir - Keranjang</title>
</head>
<body>
    <h1>Keranjang Belanja</h1>

    <table>
        <tr>
            <th>ID Barang</th>
            <th>Nama Barang</th>
            <th>Harga Barang</th>
            <th>Jumlah Beli</th>
            <th>Subtotal</th>
        </tr>
        <?php foreach ($_SESSION['keranjang'] as $barang) : ?>
        <tr>
            <td><?php echo $barang['id']; ?></td>
            <td><?php echo $barang['nama']; ?></td>
            <td><?php echo $barang['hargaJual']; ?></td>
            <td><?php echo $barang['jumlah']; ?></td>
            <td><?php echo $barang['hargaJual'] * $barang['jumlah']; ?></td>
        </tr>
        <?php endforeach; ?>
    </table>

    <p>Total Harga: <?php echo hitungTotalHarga(); ?></p>

    <a href="kasir.php">Kembali ke Daftar Barang</a>
    
</body>
</html>