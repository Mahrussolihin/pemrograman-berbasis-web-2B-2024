<?php
session_start();
require_once "koneksi.php";

if(!isset($_SESSION['username'])) {
    header("location: login.php");
    exit();
}

if(isset($_POST['submit'])) {
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $angkatan = $_POST['angkatan'];

    $sql = "INSERT INTO mahasiswa (nim, nama, alamat, angkatan) VALUES ('$nim', '$nama', '$alamat', '$angkatan')";
    
    if ($conn->query($sql) === TRUE) {
        header("location: data_mahasiswa.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Tambah Mahasiswa</title>
</head>
<body>
    <h2>Tambah Mahasiswa</h2>
    <form method="post" action="">
        <input type="text" name="nim" placeholder="NIM"><br><br>
        <input type="text" name="nama" placeholder="Nama"><br><br>
        <textarea name="alamat" placeholder="Alamat"></textarea><br><br>
        <input type="text" name="angkatan" placeholder="Angkatan"><br><br>
        <input type="submit" name="submit" value="Simpan">
    </form>
    <a href="data_mahasiswa.php">Kembali</a>
</body>
</html>
