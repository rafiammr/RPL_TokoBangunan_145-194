<?php
        include "../koneksi.php";
        $id = $_GET['id'];
        $query = mysqli_query($connect, "DELETE FROM barang where id=$id");
        if ($query) {
            header("location:barang.php?pesan2=hapus_berhasil");
        } else {
            header("location:barang.php?pesan2=hapus_gagal");
        }
        ?>