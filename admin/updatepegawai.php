<?php
include "../koneksi.php";

    $id         = $_POST['id'];
    $nama		= $_POST['nama'];
    $username	= $_POST['username'];
    $email	    = $_POST['email'];
    $password	= $_POST['password'];
    $level     	= $_POST['level'];

    $query = "UPDATE `user` SET `username`='$username',`nama`='$nama',`email`='$email',`password`='$password',`level`='$level' WHERE id= '$id'";

    $sql = mysqli_query($connect, $query);

    if($sql){
        header('Location: pegawai.php?message=input_berhasil');
    }else{
        echo "Tambah data gagal:(";
    }
?>