<?php
// Konfigurasi koneksi database
$host = 'localhost';  // Server database
$user = 'root';       // Username MySQL (sesuaikan jika berbeda)
$pass = '';           // Password MySQL (kosongkan jika tidak ada)
$db   = 'sekolah';    // Nama database

// Membuat koneksi ke database
$conn = new mysqli($host, $user, $pass, $db);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>
 