<?php
session_start();
include 'db.php'; 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = md5($_POST['password']); 

    $query = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        $_SESSION['username'] = $username;
        header("Location: dashboard.php");
        exit();
    } else {
        echo "<script>
                alert('Username atau Password salah!');
                window.location.href = 'index.php';
              </script>";
        exit();
    }
} else {
    header("Location: index.php");
    exit();
}
?>
