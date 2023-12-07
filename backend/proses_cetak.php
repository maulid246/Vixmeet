<?php
// Include the koneksi.php file
include('../backend/koneksi.php');

// Initialize variables to store agenda details
$judul_rapat = $tanggal_rapat = $waktu_rapat = $tempat_rapat = $pemimpin_rapat = $hasil_rapat = $undangan_data = $dokumentasi_data = $presensi_data = "";

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get data from the form
    $judul_rapat = $_POST["judul_rapat"];
    $tanggal_rapat = $_POST["tanggal"];
    $waktu_rapat = $_POST["waktu"];
    $tempat_rapat = $_POST["tempat"];
    $pemimpin_rapat = $_POST["pimpinan_rapat"];
    $hasil_rapat = $_POST["hasil_rapat"];

    // File uploads
    $undangan_data = $_FILES["undangan"]["name"];
    $dokumentasi_data = $_FILES["dokumentasi"]["name"];
    $presensi_data = $_FILES["presensi"]["name"];

    // TODO: Add code to move uploaded files to the desired directory
    $undangan_directory = '../assets/img';
    $dokumentasi_directory = '../assets/img';
    $presensi_directory = '../assets/img';

    move_uploaded_file($_FILES['undangan']['tmp_name'], $undangan_directory . $undangan_data);
    move_uploaded_file($_FILES['dokumentasi']['tmp_name'], $dokumentasi_directory . $dokumentasi_data);
    move_uploaded_file($_FILES['presensi']['tmp_name'], $presensi_directory . $presensi_data);

    // TODO: Add code to store image data in the database

    // Example database code (using MySQLi prepared statements)
    $undangan_data = file_get_contents($undangan_directory . $undangan_data);
    $dokumentasi_data = file_get_contents($dokumentasi_directory . $dokumentasi_data);
    $presensi_data = file_get_contents($presensi_directory . $presensi_data);

    $stmt = $koneksi->prepare("UPDATE agenda SET undangan_data=?, dokumentasi_data=?, presensi_data=? WHERE id_rapat=?");
    $stmt->bind_param("bbsi", $undangan_data, $dokumentasi_data, $presensi_data, $id_rapat);
    $stmt->execute();
    $stmt->close();

    // Print the data

echo "<html>
    <head>
        <title>Printable Page</title>
        <style>
            table {
                border-collapse: collapse;
                width: 60%; /* Set the desired width for the table */
                margin: auto; /* Center the table on the page */
            }

            table, th, td {
                border: 1px solid black;
            }

            th, td {
                padding: 8px;
                text-align: left;
            }

            img {
                max-width: 100%; /* Make the logo responsive */
                height: auto;
                display: block; /* Ensure the image is treated as a block element */
                margin: auto; /* Center the image horizontally */
            }
            

            .print-button {
                padding: 10px 20px;
                font-size: 16px;
                background-color: #4CAF50; /* Green */
                color: white;
                border: none;
                border-radius: 5px;
                cursor: pointer;
            }
        </style>
        <script>
            function printPage() {
                window.print();
            }
        </script>
    </head>
    <body>
        
        <table>
        <tr>
                <td colspan='2'> <!-- Use colspan to span both columns -->
                    <img src='../assets/img/kopsurat-removebg-preview.png' alt='Kopsurat Logo' class='logo'>
                </td>
            </tr>

            
            <tr>
                <td>Judul Rapat</td>
                <td>$judul_rapat</td>
            </tr>
            <tr>
                <td>Tanggal Rapat</td>
                <td>$tanggal_rapat</td>
            </tr>
            <tr>
                <td>Waktu Rapat</td>
                <td>$waktu_rapat</td>
            </tr>
            <tr>
                <td>Tempat Rapat</td>
                <td>$tempat_rapat</td>
            </tr>
            <tr>
                <td>Pemimpin Rapat</td>
                <td>$pemimpin_rapat</td>
            </tr>
            <tr>
                <td>Hasil Rapat</td>
                <td>$hasil_rapat</td>
            </tr>
            <tr>
                <td>Undangan File</td>
                <td>
                    <img src='data:image/png;base64," . base64_encode($undangan_data) . "' alt='Undangan Image'>
                </td>
            </tr>
            <tr>
                <td>Dokumentasi File</td>
                <td>
                    <img src='data:image/png;base64," . base64_encode($dokumentasi_data) . "' alt='Dokumentasi Image'>
                </td>
            </tr>
            <tr>
                <td>Presensi File</td>
                <td>
                    <img src='data:image/png;base64," . base64_encode($presensi_data) . "' alt='Presensi Image'>
                </td>
            </tr>
        </table>
        <br>
        <center><button class='print-button' onclick='printPage()'>Print</button></center>
    </body>
</html>";


}
?>
