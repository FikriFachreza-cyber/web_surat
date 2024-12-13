<?php
session_start();
include 'db.php'; 


$queryMasuk = "SELECT 'Masuk' AS jenis, id, keterangan, tanggal, file FROM surat_masuk";

$queryKeluar = "SELECT 'Keluar' AS jenis, id, CONCAT('Dari ', asal, ' ke ', tujuan) AS keterangan, tanggal, file FROM surat_keluar";

$resultMasuk = mysqli_query($conn, $queryMasuk);
$resultKeluar = mysqli_query($conn, $queryKeluar);


$data = array_merge(mysqli_fetch_all($resultMasuk, MYSQLI_ASSOC), mysqli_fetch_all($resultKeluar, MYSQLI_ASSOC));


usort($data, function ($a, $b) {
    return strtotime($b['tanggal']) - strtotime($a['tanggal']);
});
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Arsip Surat - SISURAT</title>
    <link rel="stylesheet" href="arsip_surat.css">
    <script>
        function confirmDelete(id, jenis) {
            if (confirm("Apakah Anda yakin ingin menghapus surat ini?")) {
                window.location.href = `hapus_surat.php?id=${id}&jenis=${jenis}`;
            }
        }
    </script>
</head>
<body>
    <h2>Arsip Surat</h2>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Jenis Surat</th>
                <th>Keterangan</th>
                <th>Tanggal</th>
                <th>File</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            foreach ($data as $row) {
                echo "<tr>
                        <td>{$no}</td>
                        <td>{$row['jenis']}</td>
                        <td>{$row['keterangan']}</td>
                        <td>{$row['tanggal']}</td>
                        <td>";
                if (!empty($row['file'])) {
                    echo "<a href='uploads/{$row['file']}' class='btn-view' target='_blank'>Lihat Surat</a>";
                } else {
                    echo "Tidak ada file";
                }
                echo "</td>
                      <td>
                          <button onclick=\"confirmDelete({$row['id']}, '{$row['jenis']}')\" class='btn-delete'>Hapus Surat</button>
                      </td>
                    </tr>";
                $no++;
            }
            ?>
        </tbody>
    </table>
</body>
</html>