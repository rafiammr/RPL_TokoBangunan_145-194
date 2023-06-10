<?php
	include '../koneksi.php';

	$tanggal	= date("Y-m-d");
	$nama		= $_POST['nama'];
    $hargaBeli	= $_POST['hargaBeli'];
	$hargaJual	= $_POST['hargaJual'];
    $stok     	= $_POST['stok'];
	$stock		= $_POST['stok'];
	date_default_timezone_set('Asia/Jakarta');
	$waktu		= date("H:i:s");

	// Memasukkan data ke dalam tabel 'barang'
	$sqlBarang		= "INSERT INTO barang (nama, hargaBeli, hargaJual, stok) VALUES('$nama', '$hargaBeli', '$hargaJual', '$stok')";
	$queryBarang	= mysqli_query($connect, $sqlBarang) or die(mysqli_error($connect));

	// Memasukkan data ke dalam tabel 'barangmasuk'
	$sqlBarangMasuk		= "INSERT INTO barangmasuk (nama, tanggal, hargaBeli, hargaJual, stock, waktu) VALUES('$nama', '$tanggal', '$hargaBeli', '$hargaJual', '$stock', '$waktu')";
	$queryBarangMasuk	= mysqli_query($connect, $sqlBarangMasuk) or die(mysqli_error($connect));

    if($queryBarang && $queryBarangMasuk) {
		header("location:barang.php?message=input_berhasil");
	} else {
		echo "Input Data Gagal.";
	}

?>