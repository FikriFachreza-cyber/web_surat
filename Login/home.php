<?php
session_start();
include 'db.php';

$queryMasuk = "SELECT COUNT(*) AS total FROM surat_masuk";
$resultMasuk = mysqli_query($conn, $queryMasuk);
$dataMasuk = mysqli_fetch_assoc($resultMasuk)['total'];

$queryKeluar = "SELECT COUNT(*) AS total FROM surat_keluar";
$resultKeluar = mysqli_query($conn, $queryKeluar);
$dataKeluar = mysqli_fetch_assoc($resultKeluar)['total'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - SISURAT</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="home.css">
</head>
<body>
    <h2>Statistik Surat</h2>
    <canvas id="suratChart"></canvas>
    <script>
        const ctx = document.getElementById('suratChart').getContext('2d');
        const suratChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Surat Masuk', 'Surat Keluar'],
                datasets: [{
                    label: 'Jumlah Surat',
                    data: [<?php echo $dataMasuk; ?>, <?php echo $dataKeluar; ?>],
                    backgroundColor: ['#4caf50', '#f44336'],
                    borderColor: ['#388e3c', '#d32f2f'],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: { display: true }
                },
                scales: {
                    y: { beginAtZero: true }
                }
            }
        });
    </script>
</body>
</html>
