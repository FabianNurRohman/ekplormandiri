<?php
session_start();
if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit;
}

include_once("./connect.php");

$query = mysqli_query($db, "SELECT * FROM staff");
$cookieMessage = "";
if (isset($_COOKIE["last_added_staff"])) {
    $cookieMessages[] = "Staff terakhir yang ditambahkan: " . $_COOKIE["last_added_staff"];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Staff</title>
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
        <h1 class="mb-4">Daftar Staff</h1>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>No Telpon</th>
                    <th>Email</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($query as $staff) { ?>
                    <tr>
                        <td><?php echo htmlspecialchars($staff["nama"]); ?></td>
                        <td><?php echo htmlspecialchars($staff["telp"]); ?></td>
                        <td><?php echo htmlspecialchars($staff["email"]); ?></td>
                        <td>
                            <div class="btn-group" role="group">
                                <a href="edit-staff.php?id=<?php echo $staff['id']; ?>" class="btn btn-primary btn-sm">Edit</a>
                                <a href="delete-staff.php?id=<?php echo $staff['id']; ?>" class="btn btn-danger btn-sm">Hapus</a>
                            </div>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <a href="tambah-staff.php" class="btn btn-success">Tambah Staff</a>
        <a href="index.php" class="btn btn-secondary">Kembali ke Halaman Utama</a>
        <a href="buku.php" class="btn btn-info">Lihat Daftar Buku</a>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
