<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "db_cakwe";

// Buat Koneksi
try {

    // Ini adalah global variable, dan bisa diakses di semua file PHP yang membutuhkan koneksi ke database
    $conn = new mysqli($servername, $username, $password, $database);

    // Tampilkan pesan sukses jika koneksi berhasil
    echo "<script>console.log('Database connected successfully');</script>";

} catch (Exception $e) {
    // Tampilkan pesan error jika koneksi gagal
    echo "<script>console.log('Database connection failed');</script>";
    header("Location: /Cakwe/error?message=" . $e->getMessage());
}

?>