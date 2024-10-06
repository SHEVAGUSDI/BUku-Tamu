<!DOCTYPE html>
<html>
<head>
    <title>Buku Tamu</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <style>
    .error {color: #FF0000;}
    </style>
</head>
<body>
    <div class="container">
        <div class="login-form">
            <h2>Form Buku Tamu</h2>
            <?php
            session_start();
            if(!isset($_SESSION["username"])){
                header("location:index.php");
            }

            $nameErr = $emailErr = $commentErr = "";
            $name = $email = $comment = "";

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                if (empty($_POST["name"])) {
                    $nameErr = "Nama diperlukan";
                } else {
                    $name = test_input($_POST["name"]);
                    if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
                        $nameErr = "Hanya huruf dan spasi yang diizinkan";
                    }
                }

                if (empty($_POST["email"])) {
                    $emailErr = "Email diperlukan";
                } else {
                    $email = test_input($_POST["email"]);
                    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                        $emailErr = "Format email tidak valid";
                    }
                }
                if (empty($_POST["comment"])) {
                    $commentErr = "Komentar diperlukan";
                } else {
                    $comment = test_input($_POST["comment"]);
                }

                if ($nameErr == "" && $emailErr == "" && $commentErr == "") {
                    $entry = array(
                        "name" => $name,
                        "email" => $email,
                        "comment" => $comment,
                        "timestamp" => date("Y-m-d H:i:s")
                    );

                    $file = 'bukutamu.json';
                    if(file_exists($file)){
                        $current_data = file_get_contents($file);
                        $array_data = json_decode($current_data, true);
                    } else {
                        $array_data = array();
                    }

                    $array_data[] = $entry;
                    $final_data = json_encode($array_data, JSON_PRETTY_PRINT);
                    if(file_put_contents($file, $final_data)) {
                        echo "<div class='notifikasi'>Terima kasih telah mengisi buku tamu!</div>";
                        $name = $email = $comment = "";
                    } else {
                        echo "<div class='notifikasi'>Terjadi kesalahan saat menyimpan data.</div>";
                    }
                }
            }

            function test_input($data) {
                $data = trim($data);
                $data = stripslashes($data);
                $data = htmlspecialchars($data);
                return $data;
            }
            ?>

            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                <span class="error">* harus diisi.</span>
                <br><br>
                Nama: <input type="text" name="name" value="<?php echo $name;?>" class="element-input">
                <span class="error">* <?php echo $nameErr;?></span>
                <br><br>
                E-mail: <input type="text" name="email" value="<?php echo $email;?>" class="element-input">
                <span class="error">* <?php echo $emailErr;?></span>
                <br><br>
                Komentar: <textarea name="comment" rows="5" cols="40" class="element-input"><?php echo $comment;?></textarea>
                <span class="error">* <?php echo $commentErr;?></span>
                <br><br>
                <input type="submit" name="submit" value="Submit" class="button-login">
            </form>
            <br>
            <a href="lihat_bukutamu.php">Lihat Buku Tamu</a>
            <br>
            <a href="logout.php">Logout</a>
        </div>
    </div>
</body>
</html>
