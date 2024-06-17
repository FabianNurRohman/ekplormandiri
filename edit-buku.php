<?php
    include_once("./connect.php");

    $id = $_GET["id"];

    $query_get_data = mysqli_query($db, "SELECT * FROM buku WHERE id=$id");
    $buku = mysqli_fetch_assoc($query_get_data);
    
    if (isset($_POST["submit"])) {
        $nama = $_POST["nama"];
        $isbn = $_POST["isbn"];
        $unit = $_POST["unit"];

        $query = mysqli_query($db, "UPDATE buku SET nama='$nama',
        isbn='$isbn', unit=$unit WHERE id=$id");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Buku</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            padding: 20px;
        }
        .container {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Edit Buku</h2>
        <form action="" method="post">
            <div class="form-group">
                <label for="nama">Nama:</label>
                <input value="<?php echo $buku['nama']?>" type="text" class="form-control" id="nama" name="nama" required>
            </div>
            <div class="form-group">
                <label for="isbn">ISBN:</label>
                <input value="<?php echo $buku['isbn']?>" type="text" class="form-control" id="isbn" name="isbn" required>
            </div>
            <div class="form-group">
                <label for="unit">Unit:</label>
                <input value="<?php echo $buku['unit']?>" type="number" class="form-control" id="unit" name="unit" required>
            </div>
            <button action="buku.php" type="submit" class="btn btn-primary" name="submit">Submit</button>
            <a href="buku.php" class="btn btn-secondary">Kembali ke Daftar Staff</a>
        </form>
    </div>
</body>
</html>
