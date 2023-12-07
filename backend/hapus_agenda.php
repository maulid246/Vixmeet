<?php
// File koneksi ke database (koneksi.php)
include '../backend/koneksi.php';

// Ambil ID rapat dari parameter GET
$id_rapat = $_GET['id'];

// Query untuk menghapus data agenda berdasarkan ID rapat
$query = "DELETE FROM agenda WHERE id_rapat = $id_rapat";

// Eksekusi query
$result = mysqli_query($koneksi, $query);

// Cek apakah penghapusan berhasil
if ($result) {
    echo "Data agenda berhasil dihapus.";
    header ('location: ../pages/dashboard.php');
} else {
    echo "Gagal menghapus data agenda: " . mysqli_error($koneksi);
}

// Tutup koneksi
mysqli_close($koneksi);
?>
