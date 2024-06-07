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

    $sql = "UPDATE data_mahasiswa SET nama='$nama', nim='$nim', umur='$umur', jenis_kelamin='$jenis_kelamin', prodi='$prodi', jurusan='$jurusan', alamat='$alamat', angkatan='$angkatan' WHERE id=$id";
    
    if ($conn->query($sql) === TRUE) {
        header("location: data_mahasiswa.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}

if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM data_mahasiswa WHERE id=$id";
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
        <input type="number" name="id" value="<?php echo $row['id']; ?>"><br><br>
        <input type="text" name="nama" placeholder="Nama" value="<?php echo $row['nama']; ?>"><br><br>
        <input type="text" name="nim" placeholder="NIM" value="<?php echo $row['nim']; ?>"><br><br>
        <input type="number" name="umur" placeholder="Umur" value="<?php echo $row['umur']; ?>"><br><br>
        <input type="text" name="jenis_kelamin" placeholder="Jenis_Kelamin" value="<?php echo $row['jenis_kelamin']; ?>"><br><br>
        <input type="text" name="prodi" placeholder="Prodi" value="<?php echo $row['prodi']; ?>"><br><br>
        <input type="text" name="jurusan" placeholder="Jurusan" value="<?php echo $row['jurusan']; ?>"><br><br>
        <textarea name="alamat" placeholder="Alamat"><?php echo $row['alamat']; ?></textarea><br><br>
        <input type="number" name="angkatan" placeholder="Angkatan" value="<?php echo $row['angkatan']; ?>"><br><br>
        <input type="submit" name="submit" value="Update">
    </form>
    <a href="data_mahasiswa.php">Kembali</a>
</body>
</html>
