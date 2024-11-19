<?php
session_start();
if ($_SESSION['role'] != 'CS') {
    header('Location: ../index.php');
    exit;
}
include '../includes/db.php';

// Ambil data pengguna dan event
$users = $conn->query("SELECT * FROM users WHERE role IN ('Donatur', 'Penerima')");
$events = $conn->query("SELECT * FROM events");
?>
<!DOCTYPE html>
<html>
<head>
    <title>CS Dashboard</title>
</head>
<body>
<h1>CS Dashboard</h1>
<h2>Kelola Status Pengguna</h2>
<table border="1">
    <tr>
        <th>Nama</th>
        <th>Role</th>
        <th>Status</th>
        <th>Aksi</th>
    </tr>
    <?php while ($user = $users->fetch_assoc()) { ?>
        <tr>
            <td><?= $user['name'] ?></td>
            <td><?= $user['role'] ?></td>
            <td><?= $user['status'] ?></td>
            <td>
                <a href="toggle_status.php?id=<?= $user['id'] ?>">Toggle Status</a>
            </td>
        </tr>
    <?php } ?>
</table>

<h2>Kelola Status Event</h2>
<table border="1">
    <tr>
        <th>Nama Event</th>
        <th>Status</th>
        <th>Aksi</th>
    </tr>
    <?php while ($event = $events->fetch_assoc()) { ?>
        <tr>
            <td><?= $event['name'] ?></td>
            <td><?= $event['status'] ?></td>
            <td>
                <a href="toggle_event.php?id=<?= $event['id'] ?>">Toggle Status</a>
            </td>
        </tr>
    <?php } ?>
</table>
</body>
</html>
