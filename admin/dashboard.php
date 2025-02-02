<?php
include '../includes/config.php';
session_start();

// Ensure the admin is logged in
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit();
}

// Fetch the admin's ID from session
$admin_id = $_SESSION['admin'];  // Assuming the admin's ID is stored in the session

// Check if admin ID is valid
if (empty($admin_id)) {
    echo "Error: Admin ID not found in session.";
    exit();
}

// Ensure the admin ID exists in the database
$sql = "SELECT name FROM admins WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $admin_id);
$stmt->execute();
$result = $stmt->get_result();

// Check if an admin was found with the provided ID
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $admin_name = $row['name'];  // Admin's name
} else {
    $admin_name = "Admin";  // Default name if not found
}

// Fetch the count of events, members, and admins for dashboard overview
$event_count = $conn->query("SELECT COUNT(*) FROM events")->fetch_row()[0];
$member_count = $conn->query("SELECT COUNT(*) FROM members")->fetch_row()[0];
$admin_count = $conn->query("SELECT COUNT(*) FROM admins")->fetch_row()[0];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <!-- Displaying a personalized welcome message -->
    <h1>Welcome, <?= htmlspecialchars($admin_name); ?>!</h1>

    <!-- Navigation links for admin management -->
    <nav>
        <a href="manage_events.php">Manage Events</a> |
        <a href="manage_members.php">Manage Members</a> |
        <a href="manage_admins.php">Manage Admins</a> |
        <a href="send_notifications.php">Send Notifications</a> |
        <a href="view_reports.php">View Reports</a> |
        <a href="logout.php">Logout</a>
    </nav>

    <h2>Dashboard Overview</h2>
    <div class="overview">
        <div class="overview-item">
            <h3>Upcoming Events</h3>
            <p>Total Events: <?= $event_count ?></p>
            <a href="manage_events.php">Manage Events</a>
        </div>
        <div class="overview-item">
            <h3>Members</h3>
            <p>Total Members: <?= $member_count ?></p>
            <a href="manage_members.php">Manage Members</a>
        </div>
        <div class="overview-item">
            <h3>Admins</h3>
            <p>Total Admins: <?= $admin_count ?></p>
            <a href="manage_admins.php">Manage Admins</a>
        </div>
    </div>

    <h2>Quick Actions</h2>
    <div class="actions">
        <a href="add_event.php" class="button">Add New Event</a>
        <a href="create_admin.php" class="button">Add New Admin</a>
        <a href="send_notifications.php" class="button">Send Notifications</a>
    </div>
</body>
</html>
