<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">

</head>

<body>
    <h1 class="text-center m-5">Halaman Login</h1>
    <div class="container mt-5">
        <div class="row justify-content-md-center">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body m-2">
                        <form action="proses_login.php" method="post">
                            <table>
                                <tr>
                                    <td>Username</td>
                                    <td><input  type="text" name="username"></td>
                                </tr>
                                <tr>
                                    <td>Password</td>
                                    <td><input  type="password" name="password"></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td><input  type="submit" value="login"></td>
                                </tr>
                                <tr class="form-group mt-2">
                                    <td>Belum punya akun silahkan klik tombol daftar berikut :</td>
                                    <td><a href="register.php" class="btn btn-secondary">daftar</a></td>
                                </tr>
                            </table>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>