<?php
session_start();
if (empty($_SESSION['username']) || $_SESSION['level'] !== "admin_gudang") {
    header("Location:../login.php?pesan=belum_login");
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Gudang Input Barang</title>
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

.minput {
    width: 1000px;
    padding-left: 200px;
    height: 400px;
}

.form-outline {
    justify-content: start;
}

.form-label {
    font-size: large;
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
                    <a class="side-link active" aria-current="page" href="#">Profile</a>
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
        <div class="col-9 ">
            <h1 style="padding-top: 80px; font-family: popins; text-align: center;">
                Input Barang<br />
            </h1><br><br>
            <div class="col-md">
                <div class="minput">
                    <form method="POST" action="input_proses.php" style="margin-right: 3cm; font-family: Montserrat;">

                        <div style="color: #fc030f;">
                            <?php
                        if (isset($_GET['message'])) {
                            if ($_GET['message'] == "input_berhasil") {
                                echo "Input data berhasil! <br>";
                            } else if ($_GET['message'] == "input_gagal") {
                                echo "Input data gagal! <br>";
                            }
                        }
                        ?>

                            <input type="hidden" name="tanggal" value="<?php echo date("Y-m-d"); ?>">

                            <div class="form-outline">
                                <label class="form-label" for="formControlLg" style="color:black;">Nama</label>
                                <input type="int" required id="formControlLg" class="form-control form-control-lg mb-3"
                                    name="nama" style="color:black;" />
                            </div>

                            <div class="form-outline">
                                <label class="form-label" for="formControlLg" style="color:black;">Harga Beli</label>
                                <input type="int" required id="formControlLg" class="form-control form-control-lg mb-3"
                                    name="hargaBeli" style="color:black;" />
                            </div>

                            <div class="form-outline">
                                <label class="form-label" for="formControlLg" style="color:black;">Harga Jual</label>
                                <input type="int" required id="formControlLg" class="form-control form-control-lg mb-3"
                                    name="hargaJual" style="color:black;" />
                            </div>

                            <div class="form-outline">
                                <label class="form-label" for="formControlLg" style="color:black;">Stok</label>
                                <input type="int" required id="formControlLg" class="form-control form-control-lg mb-3"
                                    name="stok" style="color:black;" />
                            </div>

                            <input type="hidden" name="jam" value="<?php echo date("H:i:s"); ?>">

                            <div class="pt-1 mb-4 text-center">
                                <a href="read.php"><button class="btn btn-dark btn-lg btn-block  "
                                        style="color:#ffffff; width:200px;" type="submit">Input</button></a>
                            </div>
                    </form>
                </div>


            </div>
        </div>

    </div>



</body>

</html>