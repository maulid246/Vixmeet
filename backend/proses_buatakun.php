<?php
include '../backend/koneksi.php';


    // Ambil data dari form
    $username = $_POST['username'];
    $password = $_POST['password'];  // Disesuaikan dengan field pada tabel user
    $nama = $_POST['nama'];
    $prodi = $_POST['prodi'];
    $jabatan = $_POST['jabatan'];
    $level = $_POST['level'];

    // Query SQL untuk menyimpan data ke database
    
    $query = "INSERT INTO user (username, password, nama, prodi, jabatan, level) VALUES ('$username', '$password', '$nama', '$prodi', '$jabatan', '$level')";
    $result = mysqli_query($koneksi, $query);

    if ($result) {
        // Redirect ke halaman dashboard jika data berhasil disimpan
        header("Location: ../pages/user.php");
        exit();
    } else {
        // Handle error jika query gagal
        echo "Error: " . mysqli_error($koneksi);
    }

?>
