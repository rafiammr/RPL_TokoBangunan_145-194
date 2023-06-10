<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Kasir</title>
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

<body
    style="background-image: url(https://img.freepik.com/free-photo/iron-steel-material-storage_1127-3263.jpg?w=1060&t=st=1684853405~exp=1684854005~hmac=6a3e9765f36492463adbba787dba0719c0cbd68c48a41d814632501a1aa163e4);background-repeat: no-repeat;background-size: cover;">

    <a href="login.php" style="text-decoration: none;">
        <h3 style="text-align: left; " class="hover-text">Back</h3>
    </a>

    <form method="POST" action="cek_login.php">
        <div class="container text-center " style="width: max-content; padding-top: 150px;">
            <div class="row" 
                style="justify-content: center; align-items: center; background-color: white; height: 300px; width: 500px; text-align: center;border: 4px; border-radius: 20px">
                <h1>Login</h1>
                <div class="mb-3 row" style="justify-content: center;">
                    <label for="inputEmail" class="col-sm-2 col-form-label">Username</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" id="inputEmail" name="username">
                    </div>

                </div>
                <div class="mb-3 row" style="justify-content: center;">
                    <label for="inputPassowrd" class="col-sm-2 col-form-label">Password</label>
                    <div class="col-sm-5">
                        <input type="password" class="form-control" id="inputpassword" name="password">
                    </div>

                </div>
                <div class="mb-3 row" style="justify-content: center;">
                    <div class="col-sm-5">
                        <input type="submit" class="btn btn-primary" value="submit">
                    </div>

                </div>

            </div>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
            </script>
        </div>
    </form>
</body>

</html>