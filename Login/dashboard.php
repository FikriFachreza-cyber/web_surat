<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - SISURAT</title>
    <link rel="stylesheet" href="dashboard.css">
    <style>
       
        .sidebar {
            width: 250px;
            background-color: #333;
            color: white;
            height: 100vh;
            padding: 20px;
            position: fixed;
            transition: width 0.3s;
        }
        .sidebar h2 {
            text-align: center;
        }
        .sidebar ul {
            list-style: none;
            padding: 0;
        }
        .sidebar ul li {
            margin: 20px 0;
        }
        .sidebar ul li a {
            color: white;
            text-decoration: none;
        }
        .sidebar .logout {
            color: red;
            display: block;
            text-align: center;
            margin-top: 20px;
        }
        .main-content {
            margin-left: 250px;
            transition: margin-left 0.3s;
            padding: 20px;
        }

    
        .sidebar.minimized {
            width: 60px;
            text-align: center;
        }
        .sidebar.minimized h2,
        .sidebar.minimized ul li a {
            display: none;
        }
        .sidebar.minimized ul li {
            margin: 10px 0;
        }
        .main-content.minimized {
            margin-left: 60px;
        }

        /* Toggle Button */
        .toggle-btn {
            position: absolute;
            top: 20px;
            right: -20px;
            width: 40px;
            height: 40px;
            background-color: #333;
            color: white;
            border: none;
            border-radius: 50%;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="dashboard-container">
        <!-- Sidebar Menu -->
        <aside class="sidebar" id="sidebar">
            <button class="toggle-btn" id="toggle-btn">≡</button>
            <h2>SISURAT</h2>
            <nav>
                <ul>
                    <li><a href="home.php" target="content-frame">Home</a></li>
                    <li><a href="surat_masuk.php" target="content-frame">Surat Masuk</a></li>
                    <li><a href="surat_keluar.php" target="content-frame">Kirim Surat</a></li>
                    <li><a href="arsip_surat.php" target="content-frame">Arsip Surat</a></li>
                </ul>
            </nav>
            <a href="logout.php" class="logout">Logout</a>
        </aside>

        <!-- Main Content (Iframe) -->
        <main class="main-content" id="main-content">
            <iframe name="content-frame" src="home.php" frameborder="0" style="width: 100%; height: 100%;"></iframe>
        </main>
    </div>

    <script>
        const sidebar = document.getElementById('sidebar');
        const mainContent = document.getElementById('main-content');
        const toggleBtn = document.getElementById('toggle-btn');

        toggleBtn.addEventListener('click', () => {
            sidebar.classList.toggle('minimized');
            mainContent.classList.toggle('minimized');
        });
    </script>
</body>
</html>
