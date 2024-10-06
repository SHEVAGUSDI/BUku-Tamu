<!DOCTYPE html>
<html>
<head>
    <title>Login Sukses</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="container">
        <div class="login-form">
            <?php
            session_start();
            if(isset($_SESSION["username"])){
                echo "<h2>Selamat Datang, " . $_SESSION["username"] . "!</h2>";
                echo '<div class="input">
                         <form action="bukutamu.php" method="get">
                            <button type="submit" class="button-login">Buka Buku Tamu</button>
                         </form>
                      </div>';
            }
            else {
                header("location:index.php?login_gagal");
            }
            ?>
        </div>
    </div>
</body>
</html>
