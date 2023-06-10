<?php
session_start();
include "../koneksi.php";

// Fungsi untuk mengurangi stok barang
function kurangiStokBarang($id, $jumlah_beli) {
    // Mengurangi stok barang di database
    include "../koneksi.php";
    $query = mysqli_query($connect , "UPDATE barang SET stok = stok - $jumlah_beli WHERE id = $id")
    or die(mysqli_error($connect));
    if ($query) {
        return true;
    } else {
        return false;
    } 
}

// Mendapatkan nama barang berdasarkan ID barang
function getNamaBarang($id) {
    global $connect;
    
    $query = mysqli_query($connect, "SELECT nama FROM barang WHERE id = $id");
    $result = mysqli_fetch_assoc($query);
    
    return $result['nama'];
}

// Mendapatkan harga barang berdasarkan ID barang
function getHargaBarang($id) {
    global $connect;
    
    $query = mysqli_query($connect, "SELECT hargaJual FROM barang WHERE id = $id");
    $result = mysqli_fetch_assoc($query);
    
    return $result['hargaJual'];
}

// Proses jika tombol "Proses" ditekan
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['proses'])) {
    // Mendapatkan ID terakhir dari tabel riwayat
    $query = mysqli_query($connect, "SELECT MAX(id) AS last_id FROM riwayat");
    $result = mysqli_fetch_assoc($query);
    $last_id = $result['last_id'];

    // Loop melalui barang di keranjang
    foreach ($_SESSION['keranjang'] as $barang) {
        $id_barang = $barang['id'];
        $jumlah_beli = $barang['jumlah'];

        // Kurangi stok barang
        $berhasil_kurang_stok = kurangiStokBarang($id_barang, $jumlah_beli);

        if ($berhasil_kurang_stok) {
            // Mendapatkan nama barang
            $nama_barang = getNamaBarang($id_barang);
            // Mendapatkan harga barang
            $harga_barang = getHargaBarang($id_barang);
            // Simpan riwayat pembelian
            $tanggal = date('Y-m-d');
            date_default_timezone_set('Asia/Jakarta');
	        $jam = date("H:i:s");
            $id_transaksi = $last_id+1;
            $total = $harga_barang * $jumlah_beli;
            $query = mysqli_query($connect, "INSERT INTO riwayat (id, tanggal, nama, jumlah, harga, total, waktu) VALUES ($id_transaksi, '$tanggal', '$nama_barang', $jumlah_beli, $harga_barang, $total, '$jam')");

            if (!$query) {
                echo "Gagal menyimpan riwayat pembelian.";
            }
        } else {
            echo "Gagal mengurangi stok barang.";
        }
    }

    // Hapus keranjang belanja setelah proses pembelian selesai
    unset($_SESSION['keranjang']);

    // Alihkan pengguna kembali ke halaman kasir.php setelah selesai memproses pembelian
    header("Location: kasir.php");
    exit();
}
?>