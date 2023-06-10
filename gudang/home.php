<?php
session_start();
if (empty($_SESSION['username']) || $_SESSION['level'] !== "admin_gudang") {
    header("Location:../login.php?pesan=belum_login");
}
?>

<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Gudang Home</title>
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
    padding-left: 35px;
}
</style>

<body style="background-color: #fff8f5; overflow-x: hidden;">
    <div class="row">
        <div class="col-3 bg-dark vh-100 text-center">
            <div class="bungkus" style="padding-top: 20px; padding-bottom: 10px;">
                <a class="navbar-brand" href="home.php">
                    <img src="https://cdn-icons-png.flaticon.com/512/32/32355.png?w=740&t=st=1685429214~exp=1685429814~hmac=eb822d9ba88324fb927e65c9e53232db76311d9629c9259c29904408a0343017"
                        width="30px" alt="">
                </a>
            </div>
            <ul class="sidebar-nav">
                <li class="side-item">
                    <a class="side-link active" aria-current="page" href="profile.php">Profile</a>
                </li>
                <li class="side-item">
                    <a class="side-link" href="barang.php">Barang</a>
                </li>
                <li class="side-item">
                    <a class="side-link" href="riwayat.php">Riwayat</a>
                </li>
                <li class="side-item">
                    <a class="side-link" href="../logout.php">Logout</a>
                </li>
            </ul>

            </ul>
        </div>
        <div class="col-9 text-center">
            <h1 style="padding-top: 80px;font-family: popins;">
                Selamat Datang di Halaman Gudang<br />
                <?php
                    include '../koneksi.php';
                    $username = $_SESSION['username'];
                    echo $_SESSION['username'];
                    $sql = mysqli_query($connect, "SELECT * FROM `user` WHERE username = '$username'");
                    $data = mysqli_fetch_array($sql);
                ?>
            </h1>
        </div>

    </div>
</body>

</html>