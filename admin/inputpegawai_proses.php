<?php
	include '../koneksi.php';

	$id     	= $_POST['id'];
	$nama		= $_POST['nama'];
    $username	= $_POST['username'];
	$email     	= $_POST['email'];
    $password  	= $_POST['password'];
	$level		= $_POST['level'];


	// Memasukkan data ke dalam tabel 'user'
	$sql		= "INSERT INTO user (id, nama, username, email, `password`, `level`) VALUES('$id', '$nama', '$username', '$email', '$password', '$level')";
	$query  	= mysqli_query($connect, $sql) or die(mysqli_error($connect));


    if($query) {
		header("location:pegawai.php?message=input_berhasil");
	} else {
		echo "Input Data Gagal.";
	}

?>