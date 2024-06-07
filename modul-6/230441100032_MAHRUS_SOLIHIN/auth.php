<?php
session_start();
require_once "koneksi.php";

$username = $_POST['username'];
$password = $_POST['password'];

// Lakukan query ke database untuk memeriksa apakah username dan password cocok
$query = "SELECT * FROM login WHERE username = '$username' AND password = '$password'";
$result = $conn->query($query);

if ($result->num_rows > 0) {
    $_SESSION['username'] = $username;
    header("location: home.php");
} else {
    echo "Username atau password salah!";
}

$conn->close();
?>
