<?php
    session_start();
    if (!isset($_SESSION['email'])) {
        header("Location: login.php");
        exit;
    }
    
    include_once("./connect.php");

    $query = mysqli_query($db, "SELECT * FROM staff");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Staff</title>
</head>
<body>
    <h1>Daftar Staff</h1>

    <table border="1">
        <tr>
            <td>Nama</td>
            <td>No Telpon</td>
            <td>Email</td>
            <td>ACTION</td>
        </tr>

    <?php foreach($query as $staff) { ?>
        <tr>
            <td><?php echo $staff["nama"] ?></td>
            <td><?php echo $staff["telp"] ?></td>
            <td><?php echo $staff["email"] ?></td>
            <td>
                <a href=<?php echo "edit-staff.php?id=" . $staff["id"] ?>>EDIT</a>
                <a href=<?php echo "delete-staff.php?id=" . $staff["id"] ?>>HAPUS</a>
            </td>
        </tr>
    <?php } ?>
    </table>
    <br>
    
    <a href="./tambah-staff.php">Tambah data staff</a><br>
    <a href="./index.php">kembali ke halaman utama</a><br>
    <a href="./buku.php">Lihat daftar buku</a>
</body>
</html>