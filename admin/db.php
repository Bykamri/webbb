<?php
session_start();
if ($_SESSION['role'] != 'Admin') {
    header('Location: ../index.php');
    exit;
}
include '..includes/db.php';

// Ambil data pengguna dan event
$users = $conn->query("SELECT * FROM users");
$events = $conn->query("SELECT * FROM events");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
</head>
<body>
<h1>Admin Dashboard</h1>
<h2>Kelola Pengguna</h2>
<table border="1">
    <tr>
        <th>Nama</th>
        <th>Email</th>
        <th>Role</th>
        <th>Status</th>
        <th>Aksi</th>
    </tr>
    <?php while ($user = $users->fetch_assoc()) { ?>
        <tr>
            <td><?= $user['name'] ?></td>
            <td><?= $user['email'] ?></td>
            <td><?= $user['role'] ?></td>
            <td><?= $user['status'] ?></td>
            <td>
                <a href="edit_user.php?id=<?= $user['id'] ?>">Edit</a> |
                <a href="delete_user.php?id=<?= $user['id'] ?>">Hapus</a>
            </td>
        </tr>
    <?php } ?>
</table>

<h2>Kelola Event</h2>
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
                <a href="edit_event.php?id=<?= $event['id'] ?>">Edit</a> |
                <a href="delete_event.php?id=<?= $event['id'] ?>">Hapus</a>
            </td>
        </tr>
    <?php } ?>
</table>
</body>
</html>
