<?php
$host = "localhost";
$user = "admin"; // Ganti dengan username MySQL Anda
$pass = "123"; // Ganti dengan password MySQL Anda
$dbname = "mahasiswa"; // Ganti dengan nama database Anda

$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>
