<?php
session_start();
include 'includes/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (empty($name) || empty($email) || empty($password)) {
        echo "All fields are required!";
        exit();
    }

    // Hash password sebelum disimpan
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Tetapkan role default atau ambil dari input form jika diperlukan
    $role = 'Donatur'; // Ganti sesuai role default atau buat input form untuk memilih role

    // Periksa apakah role valid
    if (!in_array($role, ['Admin', 'CS', 'Donatur', 'Penerima'])) {
        echo "Invalid role!";
        exit();
    }

    // Siapkan statement untuk menghindari SQL injection
    $stmt = $conn->prepare("INSERT INTO users (name, email, password, role) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $name, $email, $hashed_password, $role);

    if ($stmt->execute()) {
        echo "Registration successful!";
    } else {
        echo "Error: " . $stmt->error;
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
    <title>Register</title>
</head>

<body>
    <h2>Register</h2>
    <form action="register.php" method="POST">
        <label for="name">Name:</label><br>
        <input type="text" name="name" id="name" required><br><br>
        <label for="email">Email:</label><br>
        <input type="email" name="email" id="email" required><br><br>
        <label for="password">Password:</label><br>
        <input type="password" name="password" id="password" required><br><br>
        <label for="role">Role:</label><br>
        <select name="role" id="role" required>
            <option value="Admin">Admin</option>
            <option value="CS">CS</option>
            <option value="Donatur">Donatur</option>
            <option value="Penerima">Penerima</option>
        </select><br><br>
        <button type="submit">Register</button>
    </form>
</body>

</html>