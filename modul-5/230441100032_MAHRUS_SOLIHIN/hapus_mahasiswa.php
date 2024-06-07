<?php
session_start();
require_once "koneksi.php";

if(!isset($_SESSION['username'])) {
    header("location: login.php");
    exit();
}

if(isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM mahasiswa WHERE id=$id";
    
    if ($conn->query($sql) === TRUE) {
        header("location: data_mahasiswa.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
