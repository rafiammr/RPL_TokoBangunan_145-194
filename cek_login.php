<?php
session_start();
// menghubungkan dengan koneksi
include 'koneksi.php';

// menangkap data yang dikirim dari form
$username = $_POST['username'];
$password = $_POST['password'];

// menyeleksi data admin dengan username dan password yang sesuai
$login = mysqli_query($connect, "SELECT * from user WHERE username='$username' and password='$password'") or die(mysqli_error($query));

// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($login);


if ($cek > 0) {
	$data = mysqli_fetch_assoc($login);

	if ($data['level'] == "admin") {
		$_SESSION['username'] = $username;
		$_SESSION['level'] = "admin";
		$_SESSION['id'] = $data['id'];
		header("location:admin/home.php");
	} else if ($data['level'] == "kasir") {
		// buat session login dan username
		$_SESSION['username'] = $username;
		$_SESSION['level'] = "kasir";
		$_SESSION['id'] = $data['id'];
		// alihkan ke halaman dashboard pegawai
		header("location:./kasir/home.php");
    } else if ($data['level'] == "admin_gudang") {
		// buat session login dan username
		$_SESSION['username'] = $username;
		$_SESSION['level'] = "admin_gudang";
		$_SESSION['id'] = $data['id'];
		// alihkan ke halaman dashboard pegawai
		header("location:./gudang/home.php");
	} else {
		// alihkan ke halaman login kembali
		header("location:login.php?pesan=gagal");
	}
} else {
	header("location:login.php?pesan=gagal");
}
