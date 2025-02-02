<?php
include '../includes/config.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Verify admin credentials (Check password with hashed value)
    $sql = "SELECT * FROM admins WHERE email = '$email'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        // Verify the password using password_verify() function
        if (password_verify($password, $row['password'])) {
            $_SESSION['admin'] = $email;
            header("Location: dashboard.php");
            exit();
        } else {
            echo "<p style='color:red;'>Invalid email or password!</p>";
        }
    } else {
        echo "<p style='color:red;'>Invalid email or password!</p>";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <h1>Admin Login</h1>
    <form method="POST">
        <label>Email:</label>
        <input type="email" name="email" required>

        <label>Password:</label>
        <input type="password" name="password" required>

        <button type="submit">Login</button>
    </form>
</body>
</html>
