<?php
session_start();
include 'includes/db.php';

$email = $_POST['email'];
$password = $_POST['password'];


$query = $conn->query("SELECT * FROM users WHERE email='$email'");
$user = $query->fetch_assoc();

if ($user && password_verify($password, $user['password'])) {
    $_SESSION['role'] = $user['role'];
    $_SESSION['user_id'] = $user['id'];

    switch ($user['role']) {
        case 'Admin':
            header("Location: admin/db.php");
            break;
        case 'CS':
            header("Location: cs/db.php");
            break;
        case 'Donatur':
            header("Location: donor/db.php");
            break;
        case 'Penerima':
            header("Location: recipient/db.php");
            break;
    }
} else {
    echo "Login gagal!";
}
?>
