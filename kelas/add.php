<?php
// Include konfigurasi database
include '../config.php';

// Inisialisasi statement
$stmt = null;

// Cek apakah form disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari form dan sanitasi
    $kelas = $conn->real_escape_string($_POST['kelas']);
    $jenjang = $conn->real_escape_string($_POST['jenjang']);
    $kapasitas = (int)$_POST['kapasitas']; // Mengubah kapasitas ke integer

    // Query untuk memasukkan data ke tabel kelas menggunakan prepared statement
    $sql = "INSERT INTO kelas (kelas, jenjang, kapasitas) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    
    // Pastikan statement berhasil dibuat
    if ($stmt) {
        $stmt->bind_param("ssi", $kelas, $jenjang, $kapasitas); // Mengikat parameter

        if ($stmt->execute()) {
            // Jika berhasil, redirect ke index.php
            header("Location: index.php");
            exit;
        } else {
            // Tampilkan error jika gagal
            echo "Error: " . $stmt->error;
        }
    } else {
        echo "Error preparing statement: " . $conn->error;
    }
}

// Menutup statement jika didefinisikan
if ($stmt) {
    $stmt->close();
}

// Menutup koneksi
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Kelas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f7f9fb;
            font-family: 'Poppins', sans-serif;
        }
        .container {
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            margin-top: 50px;
        }
        h1 {
            font-size: 2.5rem;
            color: #333;
            margin-bottom: 20px;
        }
        .btn-success {
            background-color: #74b9ff;
            border-color: #74b9ff;
        }
        .btn-success:hover {
            background-color: #0984e3;
        }
    </style>
</head>
<body>
    <div class="container mt-4">
        <h1 class="text-center">Tambah Kelas</h1>
        <form method="POST">
            <div class="mb-3">
                <label for="kelas" class="form-label">Kelas</label>
                <input type="text" class="form-control" id="kelas" name="kelas" required>
            </div>
            <div class="mb-3">
                <label for="jenjang" class="form-label">Jenjang</label>
                <input type="text" class="form-control" id="jenjang" name="jenjang" required>
            </div>
            <div class="mb-3">
                <label for="kapasitas" class="form-label">Kapasitas</label>
                <input type="number" class="form-control" id="kapasitas" name="kapasitas" required min="1">
            </div>
            <div class="mb-3">
                <label for="wali_kelas" class="form-label">Wali Kelas</label>
                <input type="text" class="form-control" id="wali_kelas" name="wali_kelas" required min="1">
            </div>
            
            <button type="submit" class="btn btn-success">Simpan</button>
            <a href="index.php" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</body>
</html>


