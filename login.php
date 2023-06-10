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
    .hover-text {
        color: white;
        transition: color 0.3s;
        opacity: 75%;

    }
</style>

<body style="background-image: url(aset/tokobangunan.jpg);background-repeat: no-repeat;background-size: cover;">
    <div style="display: flex;">
        <a href="index.php" style="text-decoration: none;">
            <h3 style="text-align: left; " class="hover-text">Back</h3>
        </a>
    </div>

    <div class="container text-center " style="width: max-content; padding-top: 200px;">

        <div class="row"
            style="justify-content: center; align-items: center; background-color: white; height: 200px; width: 500px;border: 4px ;border-radius: 25px;">
            <h3>Toko Bangunan Eko Dadi</h3>
            <div style="color: #fc030f;">
                <?php
                    if (isset($_GET['pesan'])) {
                        if ($_GET['pesan'] == "gagal") {
                            echo "Login gagal! username dan password salah! <br>";
                        } else if ($_GET['pesan'] == "logout") {
                            echo "Anda telah berhasil logout <br>";
                        } else if ($_GET['pesan'] == "belum_login") {
                            echo "Anda harus login untuk mengakses halaman <br>";
                        }
                    }
                    ?>
            </div>
            <div class="col">

                <a class="btn btn-primary " style="padding-right: 30px; padding-left: 30px;" href="inputLogin.php"
                    role="button">Login</a>
            </div>


        </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>
</body>

</html>