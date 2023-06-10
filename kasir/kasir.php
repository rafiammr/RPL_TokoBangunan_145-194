<?php
session_start();
if (empty($_SESSION['username']) || $_SESSION['level'] !== "kasir") {
    header("Location:../login.php?pesan=belum_login");
}
?>

<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Kasir</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
<style>
.sidebar-nav {
    display: flex;
    flex-direction: column;
    color: #ffffff;
    list-style: none;
    height: 40vh;
}

.side-item {
    width: 100%;
    padding-top: 1rem;
    padding-bottom: 1rem;
}

.side-item>a {
    text-decoration: none;
    color: #ffffff;
    padding: 1rem;
    width: 100%;
    height: 100%;
}

.side-item>a:hover {
    background: rgb(39, 40, 40);
    color: #ffffff;
}

.navbar-brand {
    padding-left: 30px;
}

.bungkus:hover {
    background: rgb(39, 40, 40);
    color: #ffffff;
}

.mkasir {
    width: 1200px;
    overflow-y: scroll;
    padding-left: 100px;
    height: 200px;
}

.mkasir2 {
    width: 1200px;
    overflow-y: scroll;
    height: 150px;
    padding-left: 100px;
}
</style>

<body style="background-color: #fff8f5; overflow-x: hidden; ">
    <div class="row">
        <div class="col-3 bg-dark vh-100 text-center">
            <div class="bungkus" style="padding-top: 20px; padding-bottom: 10px;">
                <a class="navbar-brand" href="home.php">
                    <img src="https://cdn.icon-icons.com/icons2/520/PNG/512/Cashier-machine_icon-icons.com_52200.png"
                        width="30px" alt="">
                </a>
            </div>

            <ul class="sidebar-nav">
                <li class="side-item">
                    <a class="side-link active" href="profile.php">Profile</a>
                </li>
                <li class="side-item">
                    <a class="side-link" href="kasir.php">Kasir</a>
                </li>
                <li class="side-item">
                    <a class="side-link" href="lihatbarang.php">Lihat Barang</a>
                </li>
                <li class="side-item">
                    <a class="side-link" href="history.php">History</a>
                </li>
                <li class="side-item">
                    <a class="side-link" href="../logout.php">Logout</a>
                </li>
            </ul>

            </ul>
        </div>
        <?php
        include '../koneksi.php';
        
        // Fungsi untuk menambahkan atau memperbarui jumlah barang dalam keranjang
        function tambahBarangKeKeranjang($id, $nama, $hargaJual, $jumlah) {
            // Cek apakah barang sudah ada di keranjang
            if (isset($_SESSION['keranjang'][$id])) {
                // Jika barang sudah ada, tambahkan jumlah beli ke jumlah sebelumnya
                $_SESSION['keranjang'][$id]['jumlah'] += $jumlah;
            } else {
                // Jika barang belum ada, tambahkan data barang ke keranjang
                $_SESSION['keranjang'][$id] = array(
                    'id' => $id,
                    'nama' => $nama,
                    'hargaJual' => $hargaJual,
                    'jumlah' => $jumlah
                );
            }
        }

        // Mengurangi jumlah barang di keranjang
        function kurangiJumlahBarang($id, $jumlah_kurang) {
            if (isset($_SESSION['keranjang'][$id])) {
                // Mengurangi jumlah beli barang
                $jumlah_sekarang = $_SESSION['keranjang'][$id]['jumlah'] -= $jumlah_kurang;

                // Memastikan jumlah yang akan dikurangi tidak melebihi jumlah yang tersedia
                if ($jumlah_kurang > $jumlah_sekarang) {
                    $jumlah_kurang = $jumlah_sekarang;
                }
            
                // Jika jumlah beli kurang dari atau sama dengan 0, hapus barang dari keranjang
                if ($_SESSION['keranjang'][$id]['jumlah'] <= 0) {
                    unset($_SESSION['keranjang'][$id]);
                }
            }
        }

        // Proses jika tombol "Kurangi" ditekan
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['kurangi'])) {
            $id = $_POST['id'];
            $jumlah_kurang = $_POST['jumlah'];
            kurangiJumlahBarang($id, $jumlah_kurang);

            header("Location: kasir.php");
            exit();
        }
        
        // Ambil daftar barang dari database
        $query = mysqli_query($connect, "SELECT * FROM barang");
        $daftar_barang = mysqli_fetch_all($query, MYSQLI_ASSOC);

        // Proses jika tombol "Tambah ke Keranjang" ditekan
        if (isset($_POST['tambah_ke_keranjang'])) {
            $id = $_POST['id'];
            $nama = $_POST['nama'];
            $hargaJual = $_POST['hargaJual'];
            $jumlah = $_POST['jumlah'];

            tambahBarangKeKeranjang($id, $nama, $hargaJual, $jumlah);

            header("Location: kasir.php");
            exit();
        }

        // Proses jika tombol "Tambahkan ke Keranjang" atau "Kurangi" ditekan
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['aksi_barang'])) {
                $aksi = $_POST['aksi_barang'];

                if ($aksi === 'Tambahkan ke Keranjang') {
                    $jumlahs = $_POST['jumlah'];

                    // Loop melalui array data barang
                    foreach ($daftar_barang as $barang) {
                        $id_barang = $barang['id'];
                        $nama = $barang['nama'];
                        $hargaJual = $barang['hargaJual'];
                        $jumlah = $jumlahs[$id_barang];

                        if ($jumlah > 0) {
                            tambahBarangKeKeranjang($id_barang, $nama, $hargaJual, $jumlah);
                        }
                    }
                } elseif ($aksi === 'Kurangi') {
                    $jumlah_kurangs = $_POST['jumlah'];

                    // Loop melalui array data barang yang akan dikurangi
                    foreach ($daftar_barang as $barang) {
                        $id_barang = $barang['id'];
                        $jumlah_kurang = $jumlah_kurangs[$id_barang];

                        if ($jumlah_kurang > 0) {
                            kurangiJumlahBarang($id_barang, $jumlah_kurang);
                        }
                    }
                }
            }
            // Alihkan pengguna kembali ke halaman kasir.php setelah selesai memproses aksi
            header("Location: kasir.php");
            exit();
        }

        ?>


        <div class="col-9 text-center">
            <h1 style="font-family: popins; padding-top: 20px;">Program Kasir</h1>
            <!-- Tombol "Tambahkan ke Keranjang" dan "Kurangi" -->
            <div style="margin-top: 1cm; margin-right:1cm; width:100%; ">
                <form method="post" action="kasir.php">
                    <div class="mkasir ">

                        <table class="table align-middle mb-0 " style="color: black;">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nama Barang</th>
                                    <th>Harga</th>
                                    <th>Jumlah Beli</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($daftar_barang as $barang) : ?>
                                <tr>
                                    <td><?= $barang['id']; ?></td>
                                    <td><?= $barang['nama']; ?></td>
                                    <td><?= $barang['hargaJual']; ?></td>
                                    <td>
                                        <input type="number" name="jumlah[<?= $barang['id']; ?>]" value="0" min="0">
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                        <br>
                    </div>
                    <br>
                    <br>
                    <div>
                        <input class="btn btn" type="submit" name="aksi_barang" value="Tambahkan ke Keranjang"
                            style="background-color: #00DFA2;">
                        <input class="btn btn" type="submit" name="aksi_barang" value="Kurangi"
                            style="background-color: #FF7878;">
                    </div>
                </form>

                <?php

            // Cek apakah keranjang belanja sudah dibuat
            if (!isset($_SESSION['keranjang'])) {
                $_SESSION['keranjang'] = array();
            }

            // Fungsi untuk menghitung total harga barang di keranjang
            function hitungTotalHarga() {
                $total_harga = 0;
                foreach ($_SESSION['keranjang'] as $barang) {
                    $subtotal = $barang['hargaJual'] * $barang['jumlah'];
                    $total_harga += $subtotal;
                }
                return $total_harga;
            }
            ?>

                <br>
                <br>
                <h1 style="font-family: popins;">Keranjang Belanja</h1>

                <div class="mkasir2">
                    <div style="margin-top: 1cm; margin-right:1cm;">
                        <table class="table align-middle mb-0 " style="color: black;">
                            <tr>
                                <th>ID Barang</th>
                                <th>Nama Barang</th>
                                <th>Harga Barang</th>
                                <th>Jumlah Beli</th>
                                <th>Subtotal</th>

                            </tr>
                            <?php foreach ($_SESSION['keranjang'] as $data) : ?>
                            <tr>
                                <td><?php echo $data['id']; ?></td>
                                <td><?php echo $data['nama']; ?></td>
                                <td><?php echo $data['hargaJual']; ?></td>
                                <td><?php echo $data['jumlah']; ?></td>
                                <td><?php echo $data['hargaJual'] * $data['jumlah']; ?></td>

                            </tr>
                            <?php endforeach; ?>
                        </table>
                    </div>
                </div>

                <p style="color:black">Total Harga: <?php echo hitungTotalHarga(); ?></p>


                <form method="post" action="proses_pembelian.php">
                    <input class="btn btn-dark" type="submit" name="proses" value="Proses">
                </form>
            </div>
        </div>
    </div>

</body>

</html>