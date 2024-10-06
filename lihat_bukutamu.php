<!DOCTYPE html>
<html>
<head>
    <title>Lihat Buku Tamu</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="container">
        <div class="login-form">
            <h2>Daftar Buku Tamu</h2>
            <?php
            session_start();
            if(!isset($_SESSION["username"])){
                header("location:index.php");
            }

            $file = 'bukutamu.json';
            if(file_exists($file)){
                $current_data = file_get_contents($file);
                $array_data = json_decode($current_data, true);
                if(!empty($array_data)){
                    foreach($array_data as $entry){
                        echo "<div class='entry'>";
                        echo "<p><strong>Nama:</strong> " . htmlspecialchars($entry['name']) . "</p>";
                        echo "<p><strong>Email:</strong> " . htmlspecialchars($entry['email']) . "</p>";
                        echo "<p><strong>Komentar:</strong> " . htmlspecialchars($entry['comment']) . "</p>";
                        echo "<p><em>Waktu:</em> " . ($entry['timestamp']) . "</p>";
                        echo "<hr>";
                        echo "</div>";
                    }
                } else {
                    echo "<p>Buku tamu kosong.</p>";
                }
            } else {
                echo "<p>Buku tamu kosong.</p>";
            }
            ?>
            <br>
            <a href="bukutamu.php">Kembali ke Form Buku Tamu</a>
        </div>
    </div>
</body>
</html>
