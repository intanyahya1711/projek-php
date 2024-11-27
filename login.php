<?php
// Mulai session
session_start();

// Cek apakah pengguna sudah login
if (isset($_SESSION['username'])) {
    header("Location: index.php"); // Redirect ke halaman dashboard jika sudah login
    exit();
}

// Cek apakah form sudah di-submit
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Contoh validasi users (gunakan database di dunia nyata)
    $valid_username = "intanyahya"; // Username yang valid
    $valid_password = "intan1711"; // Password yang valid

    // Cek apakah username dan password valid
    if ($username === $valid_username && $password === $valid_password) {
        $_SESSION['username'] = $username; // Simpan username ke session
        header("Location: index.php"); // Redirect ke halaman dashboard
        exit();
    } else {
        $error_message = "Username atau password salah!"; // Pesan kesalahan
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #6c5ce7, #0984e3);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            color: #fff;
            font-family: Arial, sans-serif;
        }
        .container {
            background-color: rgba(255, 255, 255, 0.15);
            padding: 50px;
            border-radius: 15px;
            backdrop-filter: blur(15px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.3);
            max-width: 400px;
            width: 100%;
        }
        h1 {
            font-size: 2rem;
            margin-bottom: 20px;
            font-weight: bold;
        }
        .form-label {
            font-weight: 500;
        }
        .form-control {
            background-color: rgba(255, 255, 255, 0.8);
            border: none;
            border-radius: 8px;
            padding: 10px;
        }
        .form-control:focus {
            background-color: #fff;
            box-shadow: 0 0 5px rgba(255, 255, 255, 0.5);
            border: none;
        }
        #error-message {
            color: #ff7675;
            margin-bottom: 15px;
            font-weight: bold;
        }
        .btn-primary {
            background-color: #0984e3;
            border: none;
            padding: 10px 20px;
            border-radius: 8px;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }
        .btn-primary:hover {
            background-color: #74b9ff;
        }
        a.text-light:hover {
            color: #0984e3;
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container text-center">
        <h1>Login ke Crud Sekolah</h1>
        <?php if (isset($error_message)): ?>
            <div id="error-message">
                <?php echo $error_message; ?>
            </div>
        <?php endif; ?>
        <form action="login.php" method="POST" class="mt-4">
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" id="username" name="username" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" id="password" name="password" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
        </form>
        <p class="mt-3">Belum memiliki akun? <a href="register.php" class="text-light">Daftar di sini</a></p>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
