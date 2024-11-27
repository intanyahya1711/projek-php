<?php
include '../config.php';

// Mendapatkan ID siswa dari URL dan cek keamanannya
$id = $_GET['id'] ?? null;

// Menggunakan prepared statement untuk menghindari SQL Injection
$stmt = $conn->prepare("SELECT * FROM siswa WHERE id = ?");
if (!$stmt) {
    die("Prepared statement gagal: " . $conn->error);
}

$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

// Cek apakah data siswa ditemukan
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
} else {
    die("Data siswa tidak ditemukan.");
}

$stmt->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Siswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Poppins', sans-serif;
        }
        .container {
            background-color: #fff;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            margin-top: 50px;
            max-width: 800px;
        }
        h1 {
            font-size: 2.8rem;
            color: #007bff;
            margin-bottom: 30px;
            text-align: center;
            font-weight: 600;
        }
        table {
            width: 100%;
            margin-bottom: 20px;
        }
        th {
            background-color: #007bff;
            color: #fff;
            padding: 12px;
            font-weight: bold;
            text-align: center;
        }
        td {
            padding: 12px;
            color: #555;
            text-align: center;
            border-top: 1px solid #dee2e6;
        }
        .btn-secondary {
            background-color: #6c757d;
            padding: 12px 25px;
            font-size: 1.2rem;
            border-radius: 5px;
            margin-top: 20px;
            width: 100%;
            text-align: center;
            display: block;
        }
        .btn-secondary:hover {
            background-color: #5a6268;
        }
        @media (max-width: 768px) {
            h1 {
                font-size: 2rem;
            }
            .container {
                padding: 20px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Detail Siswa</h1>
        <table class="table table-bordered">
            <tr>
                <th>Nama</th>
                <td><?= htmlspecialchars($row['nama']); ?></td>
            </tr>
            <tr>
                <th>Alamat</th>
                <td><?= htmlspecialchars($row['alamat']); ?></td>
            </tr>
            <tr>
                <th>Email</th>
                <td><?= htmlspecialchars($row['email']); ?></td>
            </tr>
            <tr>
                <th>Kelas</th>
                <td><?= htmlspecialchars($row['kelas']); ?></td>
            </tr>
        </table>

        <!-- Tombol Kembali -->
        <a href="index.php" class="btn btn-secondary">Kembali</a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php $conn->close(); ?>
