<?php
session_start();
if(isset($_SESSION['username'])) {
    header("location: home.php");
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    <div class='wrapper'>
    <form method="post" action="auth.php">
    <h2>Login</h2>
    <div class='input-box'>
        <input type="text" name="username" placeholder="Username" required>
        <i class='bx bxs-user'></i>
    </div>
    <div class='input-box'>
        <input type="password" name="password" placeholder="Password" required>
        <i class='bx bx-lock-alt'></i>
    </div>
        <button type="submit" class='btn'>Login</button>
    </form>
    </div>
</body>
</html>
