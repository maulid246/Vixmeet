<?php
include '../backend/koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    // Check if the ID parameter is set
    if (isset($_GET["id"])) {
        $id_rapat = $_GET["id"];

        // Fetch user data from the database
        $query = "SELECT * FROM agenda WHERE id_rapat = $id_rapat";
        $result = mysqli_query($koneksi, $query);

        if ($result) {
            $row = mysqli_fetch_assoc($result);
            $judul_rapat = $row["judul_rapat"];
            $tanggal = $row["tanggal"];
            $waktu = $row["waktu"];
            $tempat = $row["tempat"];
            $pimpinan_rapat = $row["pimpinan_rapat"];
            
        } else {
            echo "Error: " . mysqli_error($koneksi);
            exit();
        }
    } else {
        echo "Agenda ID not provided.";
        exit();
    }
} elseif ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Handle the form submission for updating user data

    // Validate and sanitize inputs
    $id_rapat = $_POST["id_rapat"];
    $judul_rapat = mysqli_real_escape_string($koneksi, $_POST["judul_rapat"]);
    $tanggal = mysqli_real_escape_string($koneksi, $_POST["tanggal"]);
    $waktu = mysqli_real_escape_string($koneksi, $_POST["waktu"]);
    $tempat = mysqli_real_escape_string($koneksi, $_POST["tempat"]);
    $pimpinan_rapat = mysqli_real_escape_string($koneksi, $_POST["pimpinan_rapat"]);
    

    // Update user data in the database
    $query = "UPDATE agenda SET 
                judul_rapat = '$judul_rapat',
                tanggal = '$tanggal',
                waktu = '$waktu',
                tempat = '$tempat',
                pimpinan_rapat = '$pimpinan_rapat'               
                WHERE id_rapat = $id_rapat";

    $result = mysqli_query($koneksi, $query);

    if ($result) {
        echo "agenda data updated successfully.";
    } else {
        echo "Error updating agenda data: " . mysqli_error($koneksi);
    }
} else {
    echo "Invalid request method.";
    exit();
}
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
    <form method="post" action="../backend/update_agenda.php">
        <div class="logo-container">
            <img src="../assets/img/kopsurat-removebg-preview.png" alt="Kopsurat Logo" class="kopsurat-logo">
        </div>
        <input type="hidden" name="id_rapat" value="<?php echo $row['id_rapat']; ?>">
        <div class="mb-3">
            <label for="judulRapat" class="form-label">Judul Rapat</label>
            <input type="text" class="form-control" id="judulRapat" name="judul_rapat" value="<?php echo $row['judul_rapat']; ?>" required>
        </div>
        <div class="mb-3">
            <label for="tanggalRapat" class="form-label">Tanggal Rapat</label>
            <input type="date" class="form-control" id="tanggalRapat" name="tanggal" value="<?php echo $row['tanggal']; ?>" required>
        </div>
        <div class="mb-3">
            <label for="waktuRapat" class="form-label">Waktu Rapat</label>
            <input type="time" class="form-control" id="waktuRapat" name="waktu" value="<?php echo $row['waktu']; ?>" required>
        </div>
        <div class="mb-3">
            <label for="tempatRapat" class="form-label">Tempat Rapat</label>
            <input type="text" class="form-control" id="tempatRapat" name="tempat" value="<?php echo $row['tempat']; ?>" required>
        </div>
        <div class="mb-3">
    <label for="pemimpinRapat" class="form-label">Pemimpin Rapat</label>
    <select class="form-select" id="pemimpinRapat" name="pimpinan_rapat" value="<?php echo $row['pimpinan_rapat']; ?>" required>
        <?php
        // Include the koneksi.php file
        include('../backend/koneksi.php');

        // Fetch user data from the user table
        $sql = "SELECT * FROM user";
        $result = $koneksi->query($sql);

        // Check if there are users
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                // Display each user as an option in the dropdown
                echo "<option value='" . $row['nama'] . "'>" . $row['nama'] . "</option>";
            }
        } else {
            echo "<option value='' disabled>No users found</option>";
        }

        // Close the database connection
        $koneksi->close();
        ?>
    </select>
</div>
        
        
            <center> <button type="submit" class="btn btn-warning" >Submit</button> </center>
    
        
        
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
