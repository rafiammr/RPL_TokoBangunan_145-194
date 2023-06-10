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
    <title>Tambah Pegawai</title>
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

.medit {
    width: 1000px;
    padding-left: 200px;
    height: 500px;
}

.form-outline {
    text-align: start;
    font-size: large;
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
            <h1 style="padding-top: 40px; font-family: popins; text-align: center;">
                Tambah Pegawai<br />
            </h1><br><br>
            <div class="col-md">
                <div class="minput">
                    <form method="POST" action="inputpegawai_proses.php"
                        style="margin-right: 3cm; font-family: Montserrat;">

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
                            <input type="hidden" name="id">

                            <div class="form-outline">
                                <label class="form-label" for="formControlLg" style="color:black;">Nama</label>
                                <input type="text" required id="formControlLg" class="form-control form-control-lg mb-3"
                                    name="nama" style="color:black;" />
                            </div>

                            <div class="form-outline">
                                <label class="form-label" for="formControlLg" style="color:black;">Username</label>
                                <input type="text" required id="formControlLg" class="form-control form-control-lg mb-3"
                                    name="username" style="color:black;" />
                            </div>

                            <div class="form-outline">
                                <label class="form-label" for="formControlLg" style="color:black;">Email</label>
                                <input type="text" required id="formControlLg" class="form-control form-control-lg mb-3"
                                    name="email" style="color:black;" />
                            </div>

                            <div class="form-outline">
                                <label class="form-label" for="formControlLg" style="color:black;">Password</label>
                                <input type="text" required id="formControlLg" class="form-control form-control-lg mb-3"
                                    name="password" style="color:black;" />
                            </div>

                            <div class="form-outline">
                                <label class="form-label" for="formControlLg" style="color:black;">Level</label>
                                <input type="text" required id="formControlLg" class="form-control form-control-lg mb-3"
                                    name="level" style="color:black;" />
                            </div>


                            <div class="pt-1 mb-4 text-center">
                                <a href="inputpegawai_proses.php"><button class="btn btn-dark btn-lg btn-block  "
                                        style="color:#ffffff; width:200px;" type="submit">Tambah</button></a>
                            </div>
                    </form>
                </div>


            </div>
        </div>
    </div>

    </div>



</body>

</html>