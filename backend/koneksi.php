<?php
$koneksi = mysqli_connect("localhost", "root", "", "agenda");
if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_errno());
}

?>