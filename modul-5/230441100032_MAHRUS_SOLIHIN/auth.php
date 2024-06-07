<?php
session_start();
require_once "koneksi.php";

if($_POST['username'] == 'admin' && $_POST['password'] == 'admin') {
    $_SESSION['username'] = $_POST['username'];
    header("location: home.php");
} else {
    echo "Username atau password salah!";
}
?>
