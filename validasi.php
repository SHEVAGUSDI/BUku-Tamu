<?php
session_start();

$username = $_POST["username"];
$password = $_POST["password"];

if($username == "Sheva" && $password == "Gusdi") {
    $_SESSION["username"] = $username;
    header("location:loginsukses.php");
} else {
    header("location:index.php?login_gagal");
}
?>
