<?php
session_start();
if (isset($_SESSION['username'])) {
    header("Location: dashboard.php"); 
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SISURAT - Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="background">
        <div class="login-container">
            <h1>SISURAT</h1>
            <p>Sistem Informasi Penanganan Surat Masuk dan Keluar</p>
            <form action="login.php" method="POST">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username" placeholder="Masukkan Username" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" placeholder="Masukkan Password" required>
                </div>
                <button type="submit" class="btn-login">Login</button>
            </form>
        </div>
    </div>
</body>
</html>
