<?php
include '../config.php';

// Cek koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Ambil data kelas dari database dan urutkan berdasarkan ID
$sql = "SELECT * FROM kelas ORDER BY id ASC"; 
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Kelas</title>
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
        .btn-primary, .btn-secondary, .btn-danger, .btn-warning, .btn-info {
            padding: 10px 20px;
            font-size: 1rem;
            border-radius: 5px;
        }
        .btn-primary {
            background-color: #74b9ff;
            border-color: #74b9ff;
        }
        .btn-primary:hover {
            background-color: #0984e3;
        }
        .btn-secondary {
            background-color: #b2bec3;
            border-color: #b2bec3;
        }
        .btn-danger:hover {
            background-color: #d63031;
        }
        table {
            margin-top: 20px;
            border-collapse: collapse;
        }
        table thead {
            background-color: #74b9ff;
            color: white;
        }
        table th, table td {
            padding: 15px;
            text-align: center;
            border: 1px solid #ddd;
        }
        table tbody tr:hover {
            background-color: #f1f2f6;
        }
        .table-responsive {
            margin-top: 20px;
        }
    </style>
</head>
<body>

    <div class="container">
        <h1 class="text-center">Daftar Kelas</h1>

        <!-- Tombol Kembali dan Tambah Kelas -->
        <div class="d-flex justify-content-between mb-4">
            <a href="http://localhost/form-user/index.php" class="btn btn-secondary">Kembali</a>
            <a href="add.php" class="btn btn-primary">Tambah Kelas</a>
        </div>

        <!-- Tabel Data Kelas -->
        <div class="table-responsive">
            <table class="table table-bordered text-center">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Kelas</th>
                        <th>Jenjang</th>
                        <th>Kapasitas</th>
                        <th>Wali Kelas</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($result->num_rows > 0): ?>
                        <?php while ($row = $result->fetch_assoc()): ?>
                            <tr>
                                <td><?= htmlspecialchars($row['id']); ?></td>
                                <td><?= htmlspecialchars($row['kelas']); ?></td>
                                <td><?= htmlspecialchars($row['jenjang']); ?></td>
                                <td><?= htmlspecialchars($row['kapasitas']); ?></td>
                                <td><?= htmlspecialchars($row['wali_kelas']); ?></td>
                                <td>
                                    <a href="read.php?id=<?= $row['id']; ?>" class="btn btn-info btn-sm">Read</a>
                                    <a href="edit.php?id=<?= $row['id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                                    <a href="delete.php?id=<?= $row['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="5" class="text-center">Tidak ada data kelas ditemukan.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php $conn->close(); ?> <!-- Menutup koneksi -->












