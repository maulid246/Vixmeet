<?php
include '../backend/koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    // Check if the ID parameter is set
    if (isset($_GET["id"])) {
        $id_user = $_GET["id"];

        // Fetch user data from the database
        $query = "SELECT * FROM user WHERE id_user = $id_user";
        $result = mysqli_query($koneksi, $query);

        if ($result) {
            $row = mysqli_fetch_assoc($result);
            $username = $row["username"];
            $password = $row["password"];
            $nama = $row["nama"];
            $prodi = $row["prodi"];
            $jabatan = $row["jabatan"];
            $level = $row["level"];
        } else {
            echo "Error: " . mysqli_error($koneksi);
            exit();
        }
    } else {
        echo "User ID not provided.";
        exit();
    }
} elseif ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Handle the form submission for updating user data

    // Validate and sanitize inputs
    $id_user = $_POST["id_user"];
    $username = mysqli_real_escape_string($koneksi, $_POST["username"]);
    $password = mysqli_real_escape_string($koneksi, $_POST["password"]);
    $nama = mysqli_real_escape_string($koneksi, $_POST["nama"]);
    $prodi = mysqli_real_escape_string($koneksi, $_POST["prodi"]);
    $jabatan = mysqli_real_escape_string($koneksi, $_POST["jabatan"]);
    $level = $_POST["level"];

    // Update user data in the database
    $query = "UPDATE user SET 
                username = '$username',
                password = '$password',
                nama = '$nama',
                prodi = '$prodi',
                jabatan = '$jabatan',
                level = '$level'
                WHERE id_user = $id_user";

    $result = mysqli_query($koneksi, $query);

    if ($result) {
        echo "User data updated successfully.";
    } else {
        echo "Error updating user data: " . mysqli_error($koneksi);
    }
} else {
    echo "Invalid request method.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <title>
    Edit User
  </title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link id="pagestyle" href="../assets/css/argon-dashboard.css?v=2.0.4" rel="stylesheet" />
</head>

<body class="">
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg position-absolute top-0 z-index-3 w-100 shadow-none my-3 navbar-transparent mt-4">
    <div class="container">
      
  </nav>
  <!-- End Navbar -->
  <main class="main-content  mt-0">
    <div class="page-header align-items-start min-vh-50 pt-5 pb-11 m-3 border-radius-lg bg-primary" style="background-image: url('../assets/img/bg.png'); background-position: top;">
      <span class="mask bg-gradient-dark opacity-6"></span>
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-5 text-center mx-auto">
            <h1 class="text-white mb-2 mt-5">Edit User</h1>
            
          </div>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="row mt-lg-n10 mt-md-n11 mt-n10 justify-content-center">
        <div class="col-xl-4 col-lg-5 col-md-7 mx-auto">
          <div class="card z-index-0">
           
            <div class="card-body">
                            <form method="post" action="../backend/update_user.php" role="form">
                                <input type="hidden" name="id_user" value="<?php echo $id_user; ?>">
                                <div class="mb-3">
                                    <input type="text" class="form-control" placeholder="Username" aria-label="Username" name="username" id="username" value="<?php echo $username; ?>">
                                </div>
                                <div class="mb-3">
                                    <input type="password" class="form-control" placeholder="Password" aria-label="Password" name="password" id="password" value="<?php echo $password; ?>">
                                </div>
                                <div class="mb-3">
                                    <input type="text" class="form-control" placeholder="Nama" aria-label="Nama" name="nama" id="nama" value="<?php echo $nama; ?>">
                                </div>
                                <div class="mb-3">
                                <select class="form-select" aria-label="Level" name="prodi" id="prodi">
        <option value="TI" <?php echo ($prodi == 'TI') ? 'selected' : ''; ?>>TI</option>
        <option value="SI" <?php echo ($prodi == 'SI') ? 'selected' : ''; ?>>SI</option>
        <option value="MP" <?php echo ($prodi == 'MP') ? 'selected' : ''; ?>>MP</option>
        <option value="Keubank" <?php echo ($prodi == 'Keubank') ? 'selected' : ''; ?>>Keubank</option>
    </select>
                                </div>
                                <div class="mb-3">
                                    <input type="text" class="form-control" placeholder="Jabatan" aria-label="Jabatan" name="jabatan" id="jabatan" value="<?php echo $jabatan; ?>">
                                </div>
                                <div class="mb-3">
    <select class="form-select" aria-label="Level" name="level" id="level">
        <option value="Admin" <?php echo ($level == 'Admin') ? 'selected' : ''; ?>>Admin</option>
        <option value="Sekertaris" <?php echo ($level == 'Sekertaris') ? 'selected' : ''; ?>>Sekertaris</option>
        
    </select>
</div>

                                <div class="text-center">
                                    <button type="submit" class="btn bg-gradient-warning w-100 my-4 mb-2">Submit</button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="footer pt-3">
        <div class="container">
            <div class="row">
                <div class="col-8 mx-auto text-center mt-1">
                    <p class="mb-0 text-secondary">
                        Copyright © <script>
                            document.write(new Date().getFullYear())
                        </script> Maulid Rifky
                    </p>
                </div>
            </div>
        </div>
    </footer>

    <!-- Core JS Files -->
    <script src="../assets/js/core/popper.min.js"></script>
    <script src="../assets/js/core/bootstrap.min.js"></script>
    <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
    <script>
        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
            var options = {
                damping: '0.5'
            }
            Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }
    </script>
    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="../assets/js/argon-dashboard.min.js?v=2.0.4"></script>
</body>

</html>
