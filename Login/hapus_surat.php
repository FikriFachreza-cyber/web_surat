<?php
session_start();
include 'db.php'; 

if (isset($_GET['id']) && isset($_GET['jenis'])) {
    $id = intval($_GET['id']);
    $jenis = $_GET['jenis'];

   
    if ($jenis === 'Masuk') {
        $table = 'surat_masuk';
    } elseif ($jenis === 'Keluar') {
        $table = 'surat_keluar';
    } else {
        echo "<script>alert('Jenis surat tidak valid.'); window.location.href = 'arsip_surat.php';</script>";
        exit;
    }

    $query = "SELECT file FROM $table WHERE id = $id";
    $result = mysqli_query($conn, $query);
    $surat = mysqli_fetch_assoc($result);

    if ($surat) {
        $filePath = 'uploads/' . $surat['file'];

        if (!empty($surat['file']) && file_exists($filePath)) {
            unlink($filePath);
        }

        $deleteQuery = "DELETE FROM $table WHERE id = $id";
        if (mysqli_query($conn, $deleteQuery)) {
            echo "<script>alert('Surat berhasil dihapus!'); window.location.href = 'arsip_surat.php';</script>";
        } else {
            echo "<script>alert('Gagal menghapus surat.'); window.location.href = 'arsip_surat.php';</script>";
        }
    } else {
        echo "<script>alert('Surat tidak ditemukan.'); window.location.href = 'arsip_surat.php';</script>";
    }
} else {
    header("Location: arsip_surat.php");
}
