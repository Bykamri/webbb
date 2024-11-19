<?php
session_start();
if ($_SESSION['role'] != 'Penerima') {
    header('Location: ../index.php');
    exit;
}
include '../includes/db.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Dashboard Penerima Donasi</title>
</head>
<body>
<h1>Dashboard Penerima Donasi</h1>
<h2>Status Pendaftaran</h2>
<p>Status Anda: Aktif</p>

<h2>Edit Data Diri</h2>
<form method="POST" action="update_profile.php">
    <label for="name">Nama:</label>
    <input type="text" name="name" id="name" required>
    <label for="email">Email:</label>
    <input type="email" name="email" id="email" required>
    <button type="submit">Update</button>
</form>
</body>
</html>
