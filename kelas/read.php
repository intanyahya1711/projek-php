<?php
include '../config.php';

// Mendapatkan ID kelas dari URL
$id = $_GET['id'] ?? null; // Menggunakan null coalescing operator

// Cek apakah ID tersedia dan valid
if ($id === null || !is_numeric($id)) {
    die("ID tidak ditemukan atau tidak valid.");
}

// Query untuk mengambil detail kelas berdasarkan ID
$sql = "SELECT * FROM kelas WHERE id = ?";
$stmt = $conn->prepare($sql); // Menggunakan prepared statement untuk keamanan
$stmt->bind_param("i", $id); // Mengikat parameter
$stmt->execute();
$result = $stmt->get_result();

// Cek apakah data ditemukan
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
} else {
    die("Data kelas tidak ditemukan.");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Kelas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Poppins', sans-serif;
        }
        .container {
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            margin-top: 50px;
            max-width: 600px;
        }
        h1 {
            font-size: 2.5rem;
            color: #007bff;
            margin-bottom: 30px;
            text-align: center;
        }
        th {
            background-color: #007bff;
            color: #fff;
        }
        .btn-secondary {
            background-color: #6c757d;
            border: none;
        }
        .btn-secondary:hover {
            background-color: #5a6268;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Detail Kelas</h1>

        <table class="table table-bordered">
            <tr>
                <th>Kelas</th>
                <td><?= htmlspecialchars($row['kelas']); ?></td>
            </tr>
            <tr>
                <th>Jenjang</th>
                <td><?= htmlspecialchars($row['jenjang']); ?></td>
            </tr>
            <tr>
                <th>Kapasitas</th>
                <td><?= htmlspecialchars($row['kapasitas']); ?></td>
            </tr>
            <tr>
                <th>Wali Kelas</th>
                <td><?= htmlspecialchars($row['wali_kelas']); ?></td>
            </tr>
        </table>

        <!-- Tombol Kembali -->
        <a href="index.php" class="btn btn-secondary">Kembali</a>
    </div>
</body>
</html>

<?php
$stmt->close(); // Menutup prepared statement
$conn->close(); // Menutup koneksi
?>





