<?php
session_start();
if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit;
}

include_once("./connect.php");

$query = mysqli_query($db, "SELECT * FROM buku");
$cookieMessage = "";
if (isset($_COOKIE["last_added_book"])) {
    $cookieMessages[] = "Buku terakhir yang ditambahkan: " . $_COOKIE["last_added_book"];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Buku</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            padding: 20px;
        }
        .container {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .table th, .table td {
            vertical-align: middle;
        }
        .btn-group a {
            margin-right: 5px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="mb-4">Daftar Buku</h1>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>ISBN</th>
                    <th>Unit</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($query as $buku) { ?>
                    <tr>
                        <td><?php echo htmlspecialchars($buku["nama"]); ?></td>
                        <td><?php echo htmlspecialchars($buku["isbn"]); ?></td>
                        <td><?php echo htmlspecialchars($buku["unit"]); ?></td>
                        <td>
                            <div class="btn-group" role="group">
                                <a href="edit-buku.php?id=<?php echo $buku['id']; ?>" class="btn btn-primary btn-sm">Edit</a>
                                <a href="delete-buku.php?id=<?php echo $buku['id']; ?>" class="btn btn-danger btn-sm">Hapus</a>
                            </div>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <a href="tambah-buku.php" class="btn btn-success">Tambah Buku</a>
        <a href="index.php" class="btn btn-secondary">Kembali ke Halaman Utama</a>
        <a href="staff.php" class="btn btn-info">Lihat Daftar Staff</a>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
