<?php
session_start();
require_once "koneksi.php";

if(!isset($_SESSION['username'])) {
    header("location: login.php");
}

// Ambil data mahasiswa dari database
$sql = "SELECT * FROM mahasiswa";
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
    <h2>Data Mahasiswa</h2>
    <table>
        <tr>
            <th>NIM</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th>Angkatan</th>
            <th>Action</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>".$row["nim"]."</td>
                        <td>".$row["nama"]."</td>
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
