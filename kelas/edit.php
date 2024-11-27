<?php
include '../config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    // Menggunakan prepared statement untuk keamanan
    $sql = "SELECT * FROM kelas WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id); // Mengikat parameter
    $stmt->execute();
    $result = $stmt->get_result();
    $kelas = $result->fetch_assoc();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $kelas = $_POST['kelas']; // Mengambil dari POST
    $jenjang = $_POST['jenjang']; // Mengambil dari POST
    $kapasitas = $_POST['kapasitas']; // Mengambil dari POST
    $wali_kelas = $_POST['wali_kelas']; // Mengambil dari POST

    // Menggunakan prepared statement untuk update
   // Misalnya, urutannya adalah kelas, jenjang, kapasitas, wali kelas, dan id (primary key untuk filter WHERE)
$stmt = $conn->prepare("UPDATE kelas SET kelas = ?, jenjang = ?, kapasitas = ?, wali_kelas = ? WHERE id = ?");
$stmt->bind_param("ssisi", $kelas, $jenjang, $kapasitas, $wali_kelas, $id); // Tambah satu 's' atau 'i' sesuai tipe data
 // Mengikat parameter

    if ($stmt->execute()) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Kelas</title>
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
        <h1 class="text-center">Edit Kelas</h1>
        <form method="POST">
            <input type="hidden" name="id" value="<?= htmlspecialchars($kelas['id']); ?>">
            <div class="mb-3">
                <label for="kelas" class="form-label">Kelas</label>
                <input type="text" class="form-control" id="kelas" name="kelas" value="<?= htmlspecialchars($kelas['kelas']); ?>" required>
            </div>
            <div class="mb-3">
                <label for="jenjang" class="form-label">Jenjang</label>
                <input type="text" class="form-control" id="jenjang" name="jenjang" value="<?= htmlspecialchars($kelas['jenjang']); ?>" required>
            </div>
            <div class="mb-3">
                <label for="kapasitas" class="form-label">Kapasitas</label>
                <input type="number" class="form-control" id="kapasitas" name="kapasitas" value="<?= htmlspecialchars($kelas['kapasitas']); ?>" required>
            </div>
            <div class="mb-3">
                <label for="wali_kelas" class="form-label">Wali Kelas</label>
                <input type="text" class="form-control" id="wali_kelas" name="wali_kelas" value="<?= htmlspecialchars($kelas['kapasitas']); ?>" required>
            </div>

            <button type="submit" class="btn btn-success">Simpan Perubahan</button>
            <a href="index.php" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</body>
</html>

<?php
$stmt->close(); // Menutup prepared statement
$conn->close(); // Menutup koneksi
?>




