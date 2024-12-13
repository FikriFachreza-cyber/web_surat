<?php
session_start();
include 'db.php'; 
$query = "SELECT * FROM surat_masuk ORDER BY tanggal DESC";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surat Masuk - SISURAT</title>
    <link rel="stylesheet" href="suratmasuk.css">
</head>
<body>
    <table>
    <table>
    <thead>
        <tr>
            <th>No</th>
            <th>Pengirim</th>
            <th>Tanggal</th>
            <th>Lihat Surat</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $no = 1;
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>
                    <td>{$no}</td>
                    <td>{$row['asal']}</td>
                    <td>{$row['tanggal']}</td>
                    <td><a href='uploads/{$row['file']}' target='_blank'>Lihat Surat</a></td>
                  </tr>";
            $no++;
        }
        ?>
    </tbody>
</table>
</body>
</html>
