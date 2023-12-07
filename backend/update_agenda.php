<?php
include('../backend/koneksi.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $agendaId = $_POST['id_rapat']; // Assuming you have a hidden input for agenda_id

    $judulRapat = $_POST['judul_rapat'];
    $tanggalRapat = $_POST['tanggal'];
    $waktuRapat = $_POST['waktu'];
    $tempatRapat = $_POST['tempat'];
    $pemimpinRapat = $_POST['pimpinan_rapat'];

    // Update data in the database
    $sql = "UPDATE agenda SET judul_rapat='$judulRapat', tanggal='$tanggalRapat', waktu='$waktuRapat', tempat='$tempatRapat', pimpinan_rapat='$pemimpinRapat' WHERE id_rapat=$agendaId";

    if ($koneksi->query($sql) === TRUE) {
        echo "Agenda updated successfully";
        header ('location: ../pages/dashboard.php');
    } else {
        echo "Error: " . $sql . "<br>" . $koneksi->error;
    }

    $koneksi->close();
} else {
    echo "Invalid request.";
}
?>
