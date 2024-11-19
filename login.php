<?php
session_start();
include 'includes/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (empty($email) || empty($password)) {
        echo "Both email and password are required!";
        exit();
    }

    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

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
            default:
                echo "Invalid role!";
                exit();
        }
        exit();
    } else {
        echo "Login failed!";
    }

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<body>
    <h2>Login</h2>
    <form action="login.php" method="POST">
        <label for="email">Email:</label><br>
        <input type="email" name="email" id="email" required><br><br>
        <label for="password">Password:</label><br>
        <input type="password" name="password" id="password" required><br><br>
        <button type="submit">Login</button>
    </form>
</body>

</html>