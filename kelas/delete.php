<?php
include 'config.php';

// Mendapatkan ID dari URL
$id = $_GET['id'];

// Validasi ID
if (!isset($id) || !is_numeric($id)) {
    die("Invalid ID");
}

// Siapkan statement untuk menghapus data
$stmt = $conn->prepare("DELETE FROM kelas WHERE id = ?");
$stmt->bind_param("i", $id); // "i" berarti integer

if ($stmt->execute()) {
    header("Location: index.php");
    exit;
} else {
    echo "Error deleting record: " . $stmt->error;
}

// Menutup statement dan koneksi
$stmt->close();
$conn->close();
?>

