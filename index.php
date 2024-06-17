<?php
session_start();
if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit;
}

// Cek apakah cookie "last_added_book" atau "last_added_staff" telah diset
$cookieMessage = "";
if (isset($_COOKIE["last_added_book"])) {
    $cookieMessage = "Buku terakhir yang ditambahkan: " . $_COOKIE["last_added_book"];
} elseif (isset($_COOKIE["last_added_staff"])) {
    $cookieMessage = "Staff terakhir yang ditambahkan: " . $_COOKIE["last_added_staff"];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Utama</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }
        .container {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            max-width: 400px;
            width: 100%;
        }
        .container h1 {
            margin-bottom: 30px;
            color: #333;
        }
        .container p {
            margin-bottom: 20px;
        }
        .container a {
            text-decoration: none;
            color: #ffffff;
        }
        .btn {
            display: block;
            width: 100%;
            margin-bottom: 15px;
            padding: 15px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .btn-primary {
            background-color: #007bff;
        }
        .btn-success {
            background-color: #28a745;
        }
        .btn-secondary {
            background-color: #6c757d;
        }
        .btn-danger {
            background-color: #dc3545;
        }
        .btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Selamat Datang di Perpustakaan</h1>
        <?php if ($cookieMessage): ?>
            <div class="alert alert-success" role="alert">
                <?php echo $cookieMessage; ?>
            </div>
        <?php endif; ?>
        <p><a href="buku.php" class="btn btn-primary">Daftar Buku</a></p>
        <p><a href="tambah-buku.php" class="btn btn-success">Tambah Buku</a></p>
        <p><a href="staff.php" class="btn btn-secondary">Daftar Staff</a></p>
        <p><a href="tambah-staff.php" class="btn btn-warning">Tambah Staff</a></p>
        <p><a href="logout_proccess.php" class="btn btn-danger">Logout</a></p>
    </div>
</body>
</html>
