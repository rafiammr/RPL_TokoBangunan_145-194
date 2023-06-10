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
    <title>Kasir Lihat Barang</title>
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

    .kotaklh {
        width: 1200px;
        overflow-y: scroll;
        padding-left: 100px;
        padding-right: 100px;
        height: 400px;
    }
</style>

<body style="background-color:#fff8f5; overflow-x: hidden;">
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
            <h1 style="padding-top: 50px; font-family: popins;">
                Lihat Barang<br />
            </h1>
            <div style="margin-top: 1cm; margin-right:1cm; width:100%;">
                <?php include '../koneksi.php'; ?>
                <div style="justify-content: end;">
                    <form method="GET" action="">
                        <div class="form-outline">
                            <input type="search" id="form1" class="form-control"
                                style="display:inline-flex; width:200px; height: 40px;" name="cari" style="color:black;" placeholder="Cari disini...." />
                            <button type="submit" value="cari" class="btn btn-primary" style="height: 40px; margin-bottom: 5px;">
                                <label class="form-label" for="form1" style="color:white;">Search</label>
                            </button>
                            <br><br><br>
                        </div>
                    </form>
                </div>
                <div class="kotaklh">
                    <table class="table align-middle mb-0 " style="color: black;">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>ID</th>
                                <th>Nama Barang</th>
                                <th>Harga Jual</th>
                                <th>Stock</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                        if (isset($_GET['cari'])) {
                            $cari = $_GET['cari'];
                            $data = mysqli_query($connect, "SELECT * FROM barang WHERE nama LIKE '%" . $cari . "%'");
                        } else {
                            $data = mysqli_query($connect, "SELECT * FROM barang");
                        }
                        $no = 1;
                        while ($d = mysqlI_fetch_array($data)) {
                        ?>
                            <tr>
                                <td>
                                    <?php echo $no++; ?>
                                </td>
                                <td>
                                    <?= $d['id']; ?>
                                </td>
                                <td>
                                    <?= $d['nama']; ?>
                                </td>
                                <td>
                                    <?= $d['hargaJual']; ?>
                                </td>
                                <td>
                                    <?= $d['stok']; ?>
                                </td>
                            </tr>
                        </tbody>
                        <?php } ?>
                    </table>

                </div>


            </div>
        </div>

    </div>



</body>

</html>