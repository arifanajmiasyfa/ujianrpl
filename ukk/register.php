<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">

</head>

<body>
    <h1 class="text-center m-5">Halaman Registrasi</h1>
    <div class="container mt-5">
        <div class="row justify-content-md-center">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body m-2">
                        <form action="proses_register.php" method="post">
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
                                    <td>email</td>
                                    <td><input  type="email" name="email"></td>
                                </tr>
                                <tr>
                                    <td>Nama Lengkap</td>
                                    <td><input  type="text" name="namalengkap"></td>
                                </tr>
                                <tr>
                                    <td>Alamat</td>
                                    <td><input  type="text" name="alamat"></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td><input  type="submit" value="Register"></td>
                                </tr>
                                <tr>
                                    <td>Sudah punya akun silahkan klik tombol berikut :</td>
                                    <td><a href="login.php" class="btn btn-sm">Login</a></td>
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