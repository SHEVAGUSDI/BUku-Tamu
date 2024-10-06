<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div align="center" class="container">
        <?php
        if(isset($_GET["login_gagal"])){
        ?>
            <div class="notifikasi">Login gagal! <br> Username atau Password salah.</div>
        <?php
        }
        ?>
        <div class="login-form">
            <h2 class="title">Selamat Datang di Website Buku Tamu</h2>
            <p>Silahkan login terlebih dahulu</p>
            <form method="post" action="validasi.php">
                <div class="input">
                    <input type="text" class="element-input" name="username" placeholder="Username" required>
                </div>
                <div class="input">
                    <input type="password" class="element-input" name="password" placeholder="Password" required>
                </div>
                <div class="input">
                    <button type="submit" name="login" class="button-login">Login</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
