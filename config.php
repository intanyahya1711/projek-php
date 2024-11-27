<?php
$host = 'localhost';
$user = 'root';  // Sesuaikan dengan user MySQL Anda
$pass = '';      // Sesuaikan dengan password MySQL Anda
$db   = 'form-user';  // Database yang sudah ada

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>
