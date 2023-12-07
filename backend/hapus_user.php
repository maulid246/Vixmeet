<?php
include '../backend/koneksi.php';

if (isset($_GET['id'])) {
    $id_user = $_GET['id'];

    // Delete user data from the database
    $query = "DELETE FROM user WHERE id_user = '$id_user'";
    $result = mysqli_query($koneksi, $query);

    if ($result) {
        // Jika penghapusan berhasil, redirect ke halaman user.php
        header("Location: ../pages/user.php");
        exit();
    } else {
        // Jika terjadi error, tampilkan pesan error
        echo "Error: " . mysqli_error($koneksi);
    }
} else {
    // Jika parameter id tidak ditemukan, redirect ke halaman user.php
    header("Location: ../pages/user.php");
    exit();
}
?>
