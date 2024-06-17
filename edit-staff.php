<?php
include_once("./connect.php");

$id = $_GET["id"];

$query_get_data = mysqli_query($db, "SELECT * FROM staff WHERE id=$id");
$staff = mysqli_fetch_assoc($query_get_data);

if (isset($_POST["submit"])) {
    $nama = $_POST["nama"];
    $telp = $_POST["telp"];
    $email = $_POST["email"];

    $query = mysqli_query($db, "UPDATE staff SET nama='$nama', telp='$telp', email='$email' WHERE id=$id");
    if ($query) {
        header("Location: staff.php");
        exit;
    } else {
        echo "Failed to update data.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Edit Staff</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="mb-4">Form Edit Data Staff</h1>
        <form action="" method="POST">
            <div class="form-group">
                <label for="nama">Nama</label>
                <input value="<?php echo htmlspecialchars($staff['nama']); ?>" type="text" class="form-control" id="nama" name="nama" required>
            </div>
            <div class="form-group">
                <label for="telp">No Telpon</label>
                <input value="<?php echo htmlspecialchars($staff['telp']); ?>" type="text" class="form-control" id="telp" name="telp" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input value="<?php echo htmlspecialchars($staff['email']); ?>" type="email" class="form-control" id="email" name="email" required>
            </div>
            <button action="staff.php" type="submit" class="btn btn-primary" name="submit">Submit</button>
            <a href="staff.php" class="btn btn-secondary">Kembali ke Daftar Staff</a>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
