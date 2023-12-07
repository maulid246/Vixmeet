<?php
include('../backend/koneksi.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $judulRapat = $_POST['judul_rapat'];
    $tanggalRapat = $_POST['tanggal'];
    $waktuRapat = $_POST['waktu'];
    $tempatRapat = $_POST['tempat'];
    $pemimpinRapat = $_POST['pimpinan_rapat'];

    // Insert data into the database
    $sql = "INSERT INTO agenda (judul_rapat, tanggal, waktu, tempat, pimpinan_rapat) VALUES ('$judulRapat', '$tanggalRapat', '$waktuRapat', '$tempatRapat', '$pemimpinRapat')";

    if ($koneksi->query($sql) === TRUE) {
        echo "Agenda added successfully";
        header('location: ../pages/dashboard.php');
    } else {
        echo "Error: " . $sql . "<br>" . $koneksi->error;
    }

    $koneksi->close();
}
?>
