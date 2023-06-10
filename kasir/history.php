<?php
session_start();
if (empty($_SESSION['username']) || $_SESSION['level'] !== "kasir") {
    header("Location:../login.php?pesan=belum_login");
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Kasir History</title>
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

.navbar-brand {
    padding-left: 30px;
}

.mhistory {
    width: 1200px;
    overflow-y: scroll;
    padding-left: 80px;
    padding-right: 100px;
    height: 550px;
}
</style>

<body style="background-color: #fff8f5;overflow-x: hidden;">
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
                    <a class="side-link active" aria-current="page" href="profile.php">Profile</a>
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
        <div class="col-9 text-center">
            <h1 style="padding-top: 40px;font-family: popins;">
                History<br /><br>
            </h1>
            <div class="mhistory">
                <table class="table align-middle mb-0 " style="color: black;">
                    <?php
                    include "../koneksi.php";
                    $data = mysqli_query($connect, "SELECT id, nama, jumlah, harga, tanggal, waktu, total FROM riwayat ORDER BY id ASC");
                    $current_id = null;
                    $total_harga = 0; // Variabel untuk menyimpan total harga
                    while ($d = mysqli_fetch_array($data)) {
                        if ($current_id !== $d['id']) {
                            $current_id = $d['id'];
                            // Jika ID berubah, tampilkan total harga pada baris sebelumnya (jika ada)
                            if ($total_harga > 0) {
                    ?>
                    <tr>
                        <td style="font-weight: bold;">Total Harga</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td><?= $total_harga; ?></td>
                        <td></td>
                    </tr>
                    <?php
                            }
                            $total_harga = 0; // Setel ulang total harga untuk ID baru
                    ?>
                    <thead>
                        <tr>
                            <th style="font-weight: bold;">ID: <?= $d['id']; ?></th>
                            <th>Tanggal Transaksi</th>
                            <th>Nama Barang</th>
                            <th>Jumlah Barang</th>
                            <th>Harga/pcs</th>
                            <th>Waktu</th>
                        </tr>
                    </thead>
                    <?php } ?>
                    <tr>
                        <td></td>
                        <td><?= $d['tanggal']; ?></td>
                        <td><?= $d['nama']; ?></td>
                        <td><?= $d['jumlah']; ?></td>
                        <td><?= $d['harga']; ?></td>
                        <td><?= $d['waktu']; ?></td>
                    </tr>
                    <?php
                        $total_harga += $d['total']; // Akumulasi total harga
                    } ?>

                    <!-- Tampilkan total harga untuk ID terakhir -->
                    <tr>
                        <td style="font-weight: bold;">Total Harga</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td><?= $total_harga; ?></td>
                        <td></td>
                    </tr>
                    </tbody>
                </table>

            </div>

        </div>

    </div>



</body>

</html>