<?php
// Include file koneksi ke database
include "koneksi.php";

// Cek apakah form telah disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari form
    $id_user = $_POST['id_user'];
    $username = $_POST['username'];
    $password = $_POST['password']; // Enkripsi password
    $nama = $_POST['nama'];
    $prodi = $_POST['prodi'];
    $jabatan = $_POST['jabatan'];
    $level = $_POST['level'];

    // Query untuk memperbarui data pengguna berdasarkan id_user
    $query = "UPDATE `user` SET 
              `username`='$username', 
              `password`='$password', 
              `nama`='$nama', 
              `prodi`='$prodi', 
              `jabatan`='$jabatan', 
              `level`='$level' 
              WHERE `id_user`='$id_user'";

    // Eksekusi query
    $result = mysqli_query($koneksi, $query);

    // Cek apakah query berhasil dieksekusi
    if ($result) {
        echo "Data user berhasil diperbarui.";
        header ('location: ../pages/user.php');
    } else {
        die("Error: " . mysqli_error($koneksi));
    }
} else {
    // Jika form tidak disubmit, redirect ke halaman utama
    header("Location: ../pages/user.php");
    exit();
}
?>
