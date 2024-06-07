<?php
session_start();
if(!isset($_SESSION['username'])) {
    header("location: login.php");
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
</head>
<body>
    <h2 align="center">Selamat datang <?php echo $_SESSION['username']; ?></h2>
    <a align="center" href="data_mahasiswa.php">Lihat Data Mahasiswa</a><br><br>
    <a href="logout.php">Logout</a>
</body>
</html>
