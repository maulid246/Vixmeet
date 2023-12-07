<script src="../assets/js/sweetalert.js"></script>
<?php
session_start();
include 'koneksi.php';
$username = $_POST['username'];
$password = $_POST['password'];

$query = "SELECT * FROM user WHERE username = '$username' AND password = '$password'";
$result = mysqli_query($koneksi, $query);

if ($result && mysqli_num_rows($result) == 1) {
    $user = mysqli_fetch_assoc($result);

    // Set session variables
    $_SESSION['username'] = $username;
    $_SESSION['prodi'] = $user['prodi'];
    $_SESSION['level'] = $user['level'];
    echo json_encode(array('status' => 'success'));
    header('location: ../pages/dashboard.php');
    
    // Jika login gagal
    echo json_encode(array('status' => 'error', 'message' => 'Invalid username or password.'));
}
?>
