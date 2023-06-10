<?php
session_start();
if (empty($_SESSION['username']) || $_SESSION['level'] !== "admin") {
    header("Location:../login.php?pesan=belum_login");
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Barang</title>
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

.mbarang {
    width: 1000px;
    overflow-y: scroll;
    padding-left: 100px;
    padding-right: 100px;
    height: 400px;
}
</style>

<body style="background-color: #fff8f5; overflow-x: hidden;">
    <div class="row">
        <div class="col-3 bg-dark vh-100 text-center">
            <div class="bungkus" style="padding-top: 20px; padding-bottom: 10px;">
                <a class="navbar-brand" href="home.php">
                    <img src="https://cdn-icons-png.flaticon.com/512/44/44357.png?w=740&t=st=1685539794~exp=1685540394~hmac=19cc8566b538d85537a9781095cfea90fe62e03928a1f282bb16a770feac0dcd"
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
                    <a class="side-link" href="history.php">History</a>
                </li>
                <li class="side-item">
                    <a class="side-link" href="pegawai.php">Pegawai</a>
                </li>
                <li class="side-item">
                    <a class="side-link" href="../logout.php">Logout</a>
                </li>
            </ul>

            </ul>
        </div>
        <div class="col-9 text-center">
            <h1 style="padding-top: 80px; font-family: popins;">
                Halaman Barang<br />
                <div class="col">
                    <div style="color: #fc030f; background-color: transparent;">
            </h1>
            <br>
            <?php
        if (isset($_GET['message'])) {
            if ($_GET['message'] == "edit_berhasil") {
                echo "Edit data berhasil! <br>";
            } else if ($_GET['message'] == "edit_gagal") {
                echo "Edit data gagal! <br>";
            }
        }
        ?>

            <div style="margin-top: 1cm; margin-right:1cm; width:100%;">

                <div class="mbarang">
                    <table class="table align-middle mb-0 " style="color: black; font-size: medium;">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nama Barang</th>
                                <th>Harga Beli</th>
                                <th>Harga Jual</th>
                                <th>Stock</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            include "../koneksi.php";
                            $query = mysqli_query($connect, "SELECT * FROM barang");
                            while ($data = mysqli_fetch_array($query)) {
                            ?>
                            <tr>
                                <td>
                                    <?= $data['id'];?>
                                </td>
                                <td>
                                    <?= $data['nama'];?>
                                </td>
                                <td>
                                    <?= $data['hargaBeli'];?>
                                </td>
                                <td>
                                    <?= $data['hargaJual'];?>
                                </td>
                                <td>
                                    <?= $data['stok'];?>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-outline-primary"><a style="color:#0096FF"
                                            href=edit.php?id=<?php echo $data['id']; ?>>Edit</a></button>
                                    <button type="button" class="btn btn-outline-danger"><a style="color:#E23E57"
                                            href=delete.php?id=<?php echo $data['id']; ?>>Hapus</a></button>
                                </td>
                            </tr>
                        </tbody>
                        <?php } ?>
                    </table>

                </div>
                <center>
                    <button type="button" class="btn btn-outline-primary"><a href="input.php"
                            style="padding-left: 25px; padding-right: 25px; color: Darkblue; text-decoration:none">input</a>
                    </button>
                </center>

            </div>
        </div>
    </div>

    </div>

    </div>


</body>

</html>