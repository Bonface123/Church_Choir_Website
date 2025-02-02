<?php
include '../includes/config.php';
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit();
}

// Approve admin
if (isset($_GET['approve'])) {
    $id = $_GET['approve'];
    $conn->query("UPDATE admins SET status = 'Approved' WHERE id = $id");
    header("Location: manage_admins.php");
}

// Remove admin
if (isset($_GET['remove'])) {
    $id = $_GET['remove'];
    $conn->query("DELETE FROM admins WHERE id = $id");
    header("Location: manage_admins.php");
}

// Add new admin
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add_admin'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Encrypt password
    $role = $_POST['role'];

    // Insert new admin into database
    $sql = "INSERT INTO admins (name, email, password, role, status) 
            VALUES ('$name', '$email', '$password', '$role', 'Pending')";
    if ($conn->query($sql) === TRUE) {
        echo "<p>New admin added successfully!</p>";
    } else {
        echo "<p style='color:red;'>Error: " . $conn->error . "</p>";
    }
}

// Fetch admins
$sql = "SELECT * FROM admins ORDER BY created_at DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Admins</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <h1>Manage Admins</h1>
    <a href="dashboard.php">Back to Dashboard</a>

    <!-- Add New Admin Form -->
    <h2>Add New Admin</h2>
    <form method="POST">
        <label>Name:</label>
        <input type="text" name="name" required>

        <label>Email:</label>
        <input type="email" name="email" required>

        <label>Password:</label>
        <input type="password" name="password" required>

        <label>Role:</label>
        <select name="role" required>
            <option value="Admin">Admin</option>
            <option value="Super Admin">Super Admin</option>
        </select>

        <button type="submit" name="add_admin">Add Admin</button>
    </form>

    <h2>Existing Admins</h2>
    <table border="1">
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Role</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()) : ?>
            <tr>
                <td><?= $row['name']; ?></td>
                <td><?= $row['email']; ?></td>
                <td><?= $row['role']; ?></td>
                <td><?= $row['status']; ?></td>
                <td>
                    <?php if ($row['status'] == 'Pending') : ?>
                        <a href="manage_admins.php?approve=<?= $row['id']; ?>">Approve</a> |
                    <?php endif; ?>
                    <a href="manage_admins.php?remove=<?= $row['id']; ?>" onclick="return confirm('Are you sure?');">Remove</a>
                </td>
            </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>
