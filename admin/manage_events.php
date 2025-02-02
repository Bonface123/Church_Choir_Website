<?php
include '../includes/config.php';
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit();
}

// Handle event deletion
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $conn->query("DELETE FROM events WHERE id = $id");
    header("Location: manage_events.php");
}

// Fetch events
$sql = "SELECT * FROM events ORDER BY event_date ASC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Events</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <h1>Manage Events</h1>
    <a href="dashboard.php">Back to Dashboard</a>
    <table border="1">
        <tr>
            <th>Title</th>
            <th>Date</th>
            <th>Location</th>
            <th>Description</th>
            <th>Action</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()) : ?>
            <tr>
                <td><?= $row['title']; ?></td>
                <td><?= $row['event_date']; ?></td>
                <td><?= $row['location']; ?></td>
                <td><?= $row['description']; ?></td>
                <td>
                    <a href="edit_event.php?id=<?= $row['id']; ?>">Edit</a> |
                    <a href="manage_events.php?delete=<?= $row['id']; ?>" onclick="return confirm('Are you sure?');">Delete</a>
                </td>
            </tr>
        <?php endwhile; ?>
    </table>
    <br>
    <a href="add_event.php">Add New Event</a>
</body>
</html>
