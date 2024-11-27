<?php
include '../config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $email = $_POST['email'];
    $kelas = $_POST['kelas'];

    // Gunakan prepared statement untuk mencegah SQL Injection
    $stmt = $conn->prepare("INSERT INTO siswa (nama, alamat, email, kelas) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $nama, $alamat, $email, $kelas);

    if ($stmt->execute() === TRUE) {
        header("Location: index.php");
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Siswa</title>
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
            max-width: 600px;
        }
        h1 {
            font-size: 2.5rem;
            color: #333;
            margin-bottom: 20px;
            text-align: center;
        }
        .form-label {
            font-weight: bold;
            color: #555;
        }
        .form-control {
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 10px;
            font-size: 1rem;
        }
        .btn-success {
            background-color: #28a745;
            border-color: #28a745;
            padding: 10px 20px;
            font-size: 1rem;
            border-radius: 5px;
        }
        .btn-success:hover {
            background-color: #218838;
        }
        .btn-secondary {
            background-color: #6c757d;
            border-color: #6c757d;
            padding: 10px 20px;
            font-size: 1rem;
            border-radius: 5px;
        }
    </style>
</head>
<body>

    <div class="container">
        <h1>Tambah Siswa</h1>
        <form method="POST">
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" required>
            </div>
            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <input type="text" class="form-control" id="alamat" name="alamat" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-3">
                <label for="kelas" class="form-label">Kelas</label>
                <input type="text" class="form-control" id="kelas" name="kelas" required>
            </div>
            <button type="submit" class="btn btn-success">Simpan</button>
            <a href="index.php" class="btn btn-secondary">Kembali</a>
        </form>
    </div>

</body>
</html>

