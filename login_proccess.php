<?php
session_start();
include_once("./connect.php");

if(isset($_POST['email']) && isset($_POST['password'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Cegah SQL Injection dengan menggunakan prepared statements
    $stmt = $db->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        if(password_verify($password, $row['password'])) {
            $_SESSION['email'] = $email;

            // Pastikan tidak ada output sebelum header redirect
            header("Location: index.php");
            exit;
        } else {
            echo "Password salah.";
        }
    } else {
        echo "Email tidak ditemukan.";
    }

    $stmt->close();
}
?>
