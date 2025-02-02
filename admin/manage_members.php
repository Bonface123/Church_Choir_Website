<?php
include '../includes/config.php';
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit();
}

// Approve member
if (isset($_GET['approve'])) {
    $id = $_GET['approve'];
    $conn->query("UPDATE members SET status = 'Approved' WHERE id = $id");
    header("Location: manage_members.php");
}

// Remove member
if (isset($_GET['remove'])) {
    $id = $_GET['remove'];
    $conn->query("DELETE FROM members WHERE id = $id");
    header("Location: manage_members.php");
}

// Fetch members
$sql = "SELECT * FROM members ORDER BY joined_date DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Members</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <h1>Manage Members</h1>
    <a href="dashboard.php">Back to Dashboard</a>
    <table border="1">
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Role</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()) : ?>
            <tr>
                <td><?= $row['name']; ?></td>
                <td><?= $row['email']; ?></td>
                <td><?= $row['phone']; ?></td>
                <td><?= $row['role']; ?></td>
                <td><?= $row['status']; ?></td>
                <td>
                    <?php if ($row['status'] == 'Pending') : ?>
                        <a href="manage_members.php?approve=<?= $row['id']; ?>">Approve</a> |
                    <?php endif; ?>
                    <a href="manage_members.php?remove=<?= $row['id']; ?>" onclick="return confirm('Are you sure?');">Remove</a>
                </td>
            </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>
