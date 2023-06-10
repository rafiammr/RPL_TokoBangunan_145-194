<?php
include "../koneksi.php";

$id         = $_POST['id'];
$nama		= $_POST['nama'];
$hargaBeli	= $_POST['hargaBeli'];
$hargaJual	= $_POST['hargaJual'];
$stok     	= $_POST['stok'];

$query = "SELECT stok FROM barang WHERE id = $id";
$result = mysqli_query($connect, $query);
$data = mysqli_fetch_assoc($result);
$stokLama = $data['stok'];
$selisih = $stok - $stokLama;

$sql = "UPDATE barang SET nama = '$nama', hargaBeli = '$hargaBeli', hargaJual = '$hargaJual', stok = '$stok' WHERE id = $id";
$query = mysqli_query($connect, $sql);

if ($query) {
    if ($selisih != 0 && $selisih > 0) {
        $tanggal = date("Y-m-d");
        date_default_timezone_set('Asia/Jakarta');
        $waktu = date("H:i:s");
        $sqlBarangMasuk = "INSERT INTO barangmasuk (nama, tanggal, hargaBeli, hargaJual, stock, waktu) VALUES ('$nama', '$tanggal', '$hargaBeli', '$hargaJual', '$selisih', '$waktu')";
        $queryBarangMasuk = mysqli_query($connect, $sqlBarangMasuk);
    }

    header("location: barang.php?message=input_berhasil");
} else {
    echo "Update Data Gagal.";
}

//$query = mysqli_query($connect, "UPDATE barang SET tanggal='$tanggal', nama='$nama', hargaBeli='$hargaBeli',
//hargaJual='$hargaJual', stok='$stok', jam='$jam' where id='$id'")
//    or die(mysqli_error($connect));
//if ($query) {
//    header("location:barang.php?message=edit_berhasil");
//} else {
//    header("location:barang.php?message=edit_gagal");
//}