<?php
// Include the koneksi.php file
include('../backend/koneksi.php');

// Initialize variables to store agenda details
$judul_rapat = $tanggal_rapat = $waktu_rapat = $tempat_rapat = $pemimpin_rapat = "";

// Check if id_rapat is set in the URL
if (isset($_GET['id'])) {
    $id_rapat = $_GET['id'];

    // Fetch agenda details based on id_rapat
    $agendaSql = "SELECT * FROM agenda WHERE id_rapat = $id_rapat";
    $agendaResult = $koneksi->query($agendaSql);

    if ($agendaResult->num_rows > 0) {
        $agendaRow = $agendaResult->fetch_assoc();

        // Store agenda details in variables
        $judul_rapat = $agendaRow['judul_rapat'];
        $tanggal_rapat = $agendaRow['tanggal'];
        $waktu_rapat = $agendaRow['waktu'];
        $tempat_rapat = $agendaRow['tempat'];
        $pemimpin_rapat = $agendaRow['pimpinan_rapat'];
        
    
        // File uploads
      
    }
}

// Close the result set

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <title>Form Notulensi</title>
    <style>
        body {
            display: flex;
            min-height: 100vh;
            align-items: center;
            justify-content: center;
            margin: 0; 
            background: url('../assets/img/bg.png') center center/cover no-repeat;
        }
        form {
            max-width: 600px;
            margin: auto;
            background-color: rgba(255, 255, 255, 0.8); 
            padding: 20px;
            border-radius: 10px;
        }
        .logo-container {
            text-align: center;
            margin-bottom: 20px;
        }
        .kopsurat-logo {
            width: 550%; /* Sesuaikan lebar dengan kebutuhan */
            max-width: 560px; /* Maksimum lebar gambar */
            border-radius: 10px; /* Sudut melingkar */
        }
    </style>
</head>
<body>

<div class="container mt-5">
<form method="post" action="../backend/proses_cetak.php" enctype="multipart/form-data">
        <div class="logo-container">
            <img src="../assets/img/kopsurat-removebg-preview.png" alt="Kopsurat Logo" class="kopsurat-logo">
        </div>
        <div class="mb-3">
    <label for="judulRapat" class="form-label">Judul Rapat</label>
    <input type="text" class="form-control" id="judulRapat" name="judul_rapat" value="<?php echo $judul_rapat; ?>" required>
        </div>
        <div class="mb-3">
            <label for="tanggalRapat" class="form-label">Tanggal Rapat</label>
            <input type="date" class="form-control" id="tanggalRapat" name="tanggal" value="<?php echo $tanggal_rapat; ?>" required>
        </div>
        <div class="mb-3">
            <label for="waktuRapat" class="form-label">Waktu Rapat</label>
            <input type="time" class="form-control" id="waktuRapat" name="waktu" value="<?php echo $waktu_rapat; ?>" required>
        </div>
        <div class="mb-3">
            <label for="tempatRapat" class="form-label">Tempat Rapat</label>
            <input type="text" class="form-control" id="tempatRapat" name="tempat" value="<?php echo $tempat_rapat; ?>" required>
        </div>
        <div class="mb-3">
            <label for="pemimpinRapat" class="form-label">Pemimpin Rapat</label>
            <input type="text" class="form-control" id="pemimpinRapat" name="pimpinan_rapat" value="<?php echo $pemimpin_rapat; ?>" required>
        </div>
        <div class="mb-3">
            <label for="hasilRapat" class="form-label">Hasil Rapat</label>
            <textarea class="form-control" id="hasilRapat" rows="5" name="hasil_rapat" required></textarea>
        </div>
        <div class="mb-3">
            <label for="undanganFile" class="form-label">Undangan (Upload File)</label>
            <input type="file" class="form-control" id="undangan" name="undangan">
        </div>
        <div class="mb-3">
            <label for="dokumentasiFile" class="form-label">Dokumentasi (Upload File)</label>
            <input type="file" class="form-control" id="dokumentasi" name="dokumentasi">
        </div>
        <div class="mb-3">
            <label for="presensiFile" class="form-label">Presensi (Upload File)</label>
            <input type="file" class="form-control" id="presensi" name="presensi">
        </div>
        
        <a href="../pages/dashboard.php">
            <center> <button type="submit" class="btn btn-warning" >Cetak</button> </center>
        </a>
        
        
    </form>
</div>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
