<?php
session_start();
require_once "koneksi.php";

if(!isset($_SESSION['username'])) {
    header("location: login.php");
    exit();
}

if(isset($_POST['submit'])) {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $nim = $_POST['nim'];
    $umur = $_POST['umur'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $prodi = $_POST['prodi'];
    $jurusan = $_POST['jurusan'];
    $alamat = $_POST['alamat'];
    $angkatan = $_POST['angkatan'];

    $sql = "INSERT INTO data_mahasiswa (id, nama, nim, umur, jenis_kelamin, prodi, jurusan, alamat, angkatan) VALUES ('$id','$nama', '$nim', '$umur', '$jenis_kelamin', '$prodi', '$jurusan', '$alamat', '$angkatan')";
    
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
        <input type="number" name="id" placeholder="ID"><br><br>
        <input type="text" name="nama" placeholder="Nama"><br><br>
        <input type="text" name="nim" placeholder="NIM"><br><br>
        <input type="number" name="umur" placeholder="Umur"><br><br>
        <input type="text" name="jenis_kelamin" placeholder="Jenis_Kelamin"><br><br>
        <input type="text" name="prodi" placeholder="Prodi"><br><br>
        <input type="text" name="jurusan" placeholder="Jurusan"><br><br>
        <textarea name="alamat" placeholder="Alamat"></textarea><br><br>
        <input type="number" name="angkatan" placeholder="Angkatan"><br><br>
        <input type="submit" name="submit" value="Simpan">
    </form>
    <a href="data_mahasiswa.php">Kembali</a>
</body>
</html>
