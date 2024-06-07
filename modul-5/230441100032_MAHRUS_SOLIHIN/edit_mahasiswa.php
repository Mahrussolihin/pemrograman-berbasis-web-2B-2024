<?php
session_start();
require_once "koneksi.php";

if(!isset($_SESSION['username'])) {
    header("location: login.php");
    exit();
}

if(isset($_POST['submit'])) {
    $id = $_POST['id'];
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $angkatan = $_POST['angkatan'];

    $sql = "UPDATE mahasiswa SET nim='$nim', nama='$nama', alamat='$alamat', angkatan='$angkatan' WHERE id=$id";
    
    if ($conn->query($sql) === TRUE) {
        header("location: data_mahasiswa.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}

if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM mahasiswa WHERE id=$id";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Mahasiswa</title>
</head>
<body>
    <h2>Edit Mahasiswa</h2>
    <form method="post" action="">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
        <input type="text" name="nim" placeholder="NIM" value="<?php echo $row['nim']; ?>"><br><br>
        <input type="text" name="nama" placeholder="Nama" value="<?php echo $row['nama']; ?>"><br><br>
        <textarea name="alamat" placeholder="Alamat"><?php echo $row['alamat']; ?></textarea><br><br>
        <input type="text" name="angkatan" placeholder="Angkatan" value="<?php echo $row['angkatan']; ?>"><br><br>
        <input type="submit" name="submit" value="Update">
    </form>
    <a href="data_mahasiswa.php">Kembali</a>
</body>
</html>
