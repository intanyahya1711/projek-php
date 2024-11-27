<?php
// Konfigurasi koneksi database
$host = 'localhost';  // Server database
$user = 'root';       // Username MySQL (sesuaikan jika berbeda)
$pass = '';           // Password MySQL (kosongkan jika tidak ada)
$db   = 'form-user';    // Nama database

// Mengaktifkan laporan kesalahan MySQLi
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

try {
    // Membuat koneksi ke database
    $conn = new mysqli($host, $user, $pass, $db);

    // Cek koneksi
    // Koneksi berhasil jika tidak ada exception yang dilempar
    // Mysqli sudah melakukan pengecekan kesalahan
} catch (mysqli_sql_exception $e) {
    die("Koneksi gagal: " . $e->getMessage());
}
?>
