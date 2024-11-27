<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tampilan Awal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #74b9ff, #a29bfe);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            color: #fff;
            font-family: Arial, sans-serif;
            margin: 0;
        }
        .container {
            background-color: rgba(255, 255, 255, 0.15);
            padding: 60px 40px;
            border-radius: 15px;
            backdrop-filter: blur(12px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.3);
            max-width: 500px;
            width: 100%;
        }
        h1 {
            font-size: 2.5rem;
            font-weight: bold;
            color: #ffffff;
        }
        .btn-group {
            display: flex;
            flex-direction: column;
            gap: 15px;
            margin-top: 30px;
        }
        .btn {
            padding: 15px;
            font-size: 1.2rem;
            font-weight: bold;
            border: none;
            border-radius: 8px;
            transition: all 0.3s ease;
        }
        .btn-primary {
            background-color: #0984e3;
        }
        .btn-primary:hover {
            background-color: #74b9ff;
            color: #000;
        }
        .btn-secondary {
            background-color: #6c5ce7;
        }
        .btn-secondary:hover {
            background-color: #a29bfe;
            color: #000;
        }
        .btn-danger {
            background-color: #d63031;
        }
        .btn-danger:hover {
            background-color: #ff7675;
            color: #000;
        }
    </style>
</head>
<body>
    <div class="container text-center">
        <h1>Selamat Datang di CRUD Data Sekolah</h1>
        <div class="btn-group">
            <a href="siswa/index.php" class="btn btn-primary">Data Siswa</a>
            <a href="kelas/index.php" class="btn btn-secondary">Data Kelas</a>
            <a href="logout.php" class="btn btn-danger">Logout</a>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
