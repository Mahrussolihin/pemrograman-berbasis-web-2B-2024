<?php
session_start();
require_once "koneksi.php";

if(!isset($_SESSION['username'])) {
    header("location: login.php");
}

// Ambil data mahasiswa dari database
$sql = "SELECT * FROM data_mahasiswa";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Data Mahasiswa</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
    </style>
</head>
<body>
    <h2 align="center">Data Mahasiswa</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>NIM</th>
            <th>Umur</th>
            <th>Jenis Kelamin</th>
            <th>Prodi</th>
            <th>Jurusan</th>
            <th>Alamat</th>
            <th>Angkatan</th>
            <th>Action</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>".$row["id"]."</td>
                        <td>".$row["nama"]."</td>
                        <td>".$row["nim"]."</td>
                        <td>".$row["umur"]."</td>
                        <td>".$row["jenis_kelamin"]."</td>
                        <td>".$row["prodi"]."</td>
                        <td>".$row["jurusan"]."</td>
                        <td>".$row["alamat"]."</td>
                        <td>".$row["angkatan"]."</td>
                        <td><a href='edit_mahasiswa.php?id=".$row["id"]."'>Edit</a> | <a href='hapus_mahasiswa.php?id=".$row["id"]."'>Hapus</a></td>
                    </tr>";
            }
        } else {
            echo "0 results";
        }
        $conn->close();
        ?>
    </table>
    <br>
    <a href="tambah_mahasiswa.php">Tambah Data</a>
    <a href="logout.php">Logout</a>
</body>
</html>
