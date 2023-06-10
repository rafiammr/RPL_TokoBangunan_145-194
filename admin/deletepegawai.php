<?php
        include "../koneksi.php";
        $id = $_GET['id'];
        $query = mysqli_query($connect, "DELETE FROM user where id=$id");
        if ($query) {
            header("location:pegawai.php?pesan2=hapus_berhasil");
        } else {
            header("location:pegawai.php?pesan2=hapus_gagal");
        }
        ?>