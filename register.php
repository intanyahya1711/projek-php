<?php
// Mulai session
session_start();

// Koneksi ke database
$host = "localhost"; // Alamat server database
$dbUsername = "root"; // Ganti dengan username database kamu
$dbPassword = ""; // Ganti dengan password database kamu
$dbName = "form_user"; // Ganti dengan nama database kamu

// Buat koneksi
$conn = new mysqli($host, $dbUsername, $dbPassword, $dbName);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Cek apakah form sudah di-submit
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Validasi input
    if (!empty($username) && !empty($password)) {
        // Cek apakah username sudah ada
        $sql = "SELECT * FROM users WHERE username = ? LIMIT 1";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $error_message = "Username sudah digunakan!";
        } else {
            // Hash password sebelum menyimpan
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            // Insert user baru ke dalam database
            $sql = "INSERT INTO users (username, password) VALUES (?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ss", $username, $hashed_password);

            if ($stmt->execute()) {
                $success_message = "Registrasi berhasil! Silakan login.";
            } else {
                $error_message = "Terjadi kesalahan saat mendaftar. Silakan coba lagi.";
            }
        }
        $stmt->close();
    } else {
        $error_message = "Silakan isi semua kolom.";
    }
}

// Tutup koneksi
$conn->close();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #6c5ce7, #74b9ff);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            color: #fff;
        }
        .container {
            background-color: rgba(255, 255, 255, 0.1);
            padding: 40px;
            border-radius: 10px;
            backdrop-filter: blur(10px);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        }
        h1 {
            font-size: 2.5rem;
        }
        #error-message {
            color: red;
            margin-bottom: 15px;
        }
        #success-message {
            color: green;
            margin-bottom: 15px;
        }
    </style>
</head>
<body>
    <div class="container text-center">
        <h1>Registrasi</h1>
        <?php if (isset($error_message)): ?>
            <div id="error-message">
                <?php echo $error_message; ?>
            </div>
        <?php endif; ?>
        <?php if (isset($success_message)): ?>
            <div id="success-message">
                <?php echo $success_message; ?>
            </div>
        <?php endif; ?>
        <form action="register.php" method="POST" class="mt-4">
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" id="username" name="username" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" id="password" name="password" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Daftar</button>
        </form>
        <p class="mt-3">Sudah memiliki akun? <a href="login.php" class="text-light">Login di sini</a></p>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
