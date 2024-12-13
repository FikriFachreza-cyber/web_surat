<?php
session_start();
include 'db.php'; 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $tanggal = $_POST['tanggal'];
    $asal = $_POST['asal'];
    $tujuan = $_POST['tujuan'];

    $file = $_FILES['file'];
    $fileName = basename($file['name']);
    $fileTmp = $file['tmp_name'];
    $uploadDir = "uploads/";
    $fileDestination = $uploadDir . $fileName;

    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

    $allowedTypes = ['application/pdf'];
    if (in_array($file['type'], $allowedTypes)) {
        if (move_uploaded_file($fileTmp, $fileDestination)) {
            $query = "INSERT INTO surat_keluar (tanggal, asal, tujuan, file) VALUES ('$tanggal', '$asal', '$tujuan', '$fileName')";
            if (mysqli_query($conn, $query)) {
                echo "<script>alert('Surat berhasil ditambahkan!');</script>";
            } else {
                echo "<script>alert('Terjadi kesalahan pada database.');</script>";
            }
        } else {
            echo "<script>alert('Gagal mengunggah file.');</script>";
        }
    } else {
        echo "<script>alert('Tipe file tidak diperbolehkan. Hanya file PDF yang diizinkan.');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surat Keluar - SISURAT</title>
    <link rel="stylesheet" href="suratkeluar.css">
</head>
<body>
    <form action="surat_keluar.php" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="tanggal">Tanggal:</label>
            <input type="date" id="tanggal" name="tanggal" required>
        </div>
        <div class="form-group">
            <label for="asal">Tempat Asal Surat:</label>
            <select id="asal" name="asal" required>
                <option value="Badan Kepegawaian dan Pengembangan Sumber Daya Manusia (BKDPSDM)">Badan Kepegawaian dan Pengembangan Sumber Daya Manusia (BKDPSDM)</option>
                <option value="Sekretariat Daerah">Sekretariat Daerah</option>
                <option value="Inspektorat">Inspektorat</option>
                <option value="Badan Perencanaan dan Pembangunan Daerah">Badan Perencanaan dan Pembangunan Daerah</option>
                <option value="Badan Keuangan dan Aset Daerah">Badan Keuangan dan Aset Daerah</option>
                <option value="Badan Penanggulangan Bencana Daerah">Badan Penanggulangan Bencana Daerah</option>
                <option value="Badan Riset dan Inovasi Daerah">Badan Riset dan Inovasi Daerah</option>
                <option value="Badan Pendapatan Daerah">Badan Pendapatan Daerah</option>
                <option value="Badan Kesatuan Bangsa dan Politik">Badan Kesatuan Bangsa dan Politik</option>
                <option value="Dinas Perhubungan">Dinas Perhubungan</option>
                <option value="Dinas Koperasi, Usaha Kecil, Menengah, Perindustrian dan Perdagangan">Dinas Koperasi, Usaha Kecil, Menengah, Perindustrian dan Perdagangan</option>
                <option value="Dinas Pendidikan dan Kebudayaan">Dinas Pendidikan dan Kebudayaan</option>
                <option value="Dinas Sumber Daya Air, Bina Marga dan Bina Konstruksi">Dinas Sumber Daya Air, Bina Marga dan Bina Konstruksi</option>
                <option value="Dinas Kesehatan">Dinas Kesehatan</option>
                <option value="Dinas Perumahan, Kawasan Permukiman, Cipta Karya dan Tata Ruang">Dinas Perumahan, Kawasan Permukiman, Cipta Karya dan Tata Ruang</option>
                <option value="Dinas Kependudukan dan Pencatatan Sipil">Dinas Kependudukan dan Pencatatan Sipil</option>
                <option value="Dinas Sosial">Dinas Sosial</option>
                <option value="Dinas Ketenagakerjaan">Dinas Ketenagakerjaan</option>
                <option value="Dinas Pemadam Kebakaran dan Penyelamatan">Dinas Pemadam Kebakaran dan Penyelamatan</option>
            </select>
        </div>
        <div class="form-group">
            <label for="tujuan">Tujuan Surat:</label>
            <select id="tujuan" name="tujuan" required>
                <option value="Badan Kepegawaian dan Pengembangan Sumber Daya Manusia (BKDPSDM)">Badan Kepegawaian dan Pengembangan Sumber Daya Manusia (BKDPSDM)</option>
                <option value="Sekretariat Daerah">Sekretariat Daerah</option>
                <option value="Inspektorat">Inspektorat</option>
                <option value="Badan Perencanaan dan Pembangunan Daerah">Badan Perencanaan dan Pembangunan Daerah</option>
                <option value="Badan Keuangan dan Aset Daerah">Badan Keuangan dan Aset Daerah</option>
                <option value="Badan Penanggulangan Bencana Daerah">Badan Penanggulangan Bencana Daerah</option>
                <option value="Badan Riset dan Inovasi Daerah">Badan Riset dan Inovasi Daerah</option>
                <option value="Badan Pendapatan Daerah">Badan Pendapatan Daerah</option>
                <option value="Badan Kesatuan Bangsa dan Politik">Badan Kesatuan Bangsa dan Politik</option>
                <option value="Dinas Perhubungan">Dinas Perhubungan</option>
                <option value="Dinas Koperasi, Usaha Kecil, Menengah, Perindustrian dan Perdagangan">Dinas Koperasi, Usaha Kecil, Menengah, Perindustrian dan Perdagangan</option>
                <option value="Dinas Pendidikan dan Kebudayaan">Dinas Pendidikan dan Kebudayaan</option>
                <option value="Dinas Sumber Daya Air, Bina Marga dan Bina Konstruksi">Dinas Sumber Daya Air, Bina Marga dan Bina Konstruksi</option>
                <option value="Dinas Kesehatan">Dinas Kesehatan</option>
                <option value="Dinas Perumahan, Kawasan Permukiman, Cipta Karya dan Tata Ruang">Dinas Perumahan, Kawasan Permukiman, Cipta Karya dan Tata Ruang</option>
                <option value="Dinas Kependudukan dan Pencatatan Sipil">Dinas Kependudukan dan Pencatatan Sipil</option>
                <option value="Dinas Sosial">Dinas Sosial</option>
                <option value="Dinas Ketenagakerjaan">Dinas Ketenagakerjaan</option>
                <option value="Dinas Pemadam Kebakaran dan Penyelamatan">Dinas Pemadam Kebakaran dan Penyelamatan</option>
            </select>
        </div>
        <div class="form-group">
            <label for="file">Unggah File PDF:</label>
            <input type="file" id="file" name="file" accept="application/pdf" required>
        </div>
        <button type="submit" class="btn-submit">Kirim Surat</button>
    </form>
</body>
</html>
