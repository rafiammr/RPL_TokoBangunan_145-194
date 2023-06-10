<?php
session_start();
if (empty($_SESSION['username']) || $_SESSION['level'] !== "admin_gudang") {
    header("Location:../login.php?pesan=belum_login");
}
?>

<?php 
    session_start();
    include '../koneksi.php';
    $id = $_SESSION['id'];
    $query = "SELECT * FROM `user` WHERE id = '$id'";

    $sql = mysqli_query($connect, $query);
    $data = mysqli_fetch_array($sql);

?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
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

.input-login {
    background-color: #ffff;
    border: 1px solid #a9a9a9;
    border-radius: 5px;
    padding: .5rem .6rem;
    width: 80%;
    margin-bottom: 2rem;
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
            <h1 style="padding-top: 40px; font-family: popins;">
                Edit Akun Saya<br /><br>
            </h1>
            <div class="container">
                <!-- <h1 class="login-judul bebas mb-5 text-center">EDIT AKUN</h1> -->
                <form class="form" action="editakunproses.php" method="POST">
                    </ul>
                    <table class="table poppins">
                        <tbody>
                            <tr>
                                <th>ID</th>
                                <td>:</td>
                                <td>
                                    <p><?=$data['id']?></p>
                                </td>
                            </tr>
                            <tr>
                                <th>Nama</th>
                                <td>:</td>
                                <td><input type="text" name="nama" class="input-login" placeholder="Nama Lengkap"
                                        value="<?=$data['nama']?>"></td>
                            </tr>
                            <tr>
                                <th>Username</th>
                                <td>:</td>
                                <td><input type="text" name="username" class="input-login" placeholder="Username"
                                        value="<?=$data['username']?>"></td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td>:</td>
                                <td><input type="text" name="email" class="input-login" placeholder="Password"
                                        value="<?=$data['email']?>"></td>
                            </tr>
                            <tr>
                                <th>Password</th>
                                <td>:</td>
                                <td>
                                    <input type="text" name="password" class="input-login" placeholder="Password"
                                        value="<?=$data['password']?>">
                                </td>
                            </tr>
                            <tr>
                                <th>Level</th>
                                <td>:</td>
                                <td>
                                    <p><?=$data['level']?></p>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="button-input">
                        <button type="submit" class="btn btn-dark">EDIT</button>
                    </div>
                </form>
            </div>
        </div>

    </div>



</body>

</html>