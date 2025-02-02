<?php
require '../includes/config.php'; // Include database connection

// Check if any admin exists
$sql = "SELECT COUNT(*) as count FROM admins";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

if ($row['count'] == 0) {
    // First admin details
    $name = "Super Admin";  // Change this if needed
    $email = "ondusobonface9@gmail.com";  // Change this
    $phone = "0729820689";  // Change this
    $password = "Admin@123";  // Change this to a strong password

    // Hash password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Insert first admin
    $stmt = $conn->prepare("INSERT INTO admins (name, email, phone, password) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $name, $email, $phone, $hashed_password);

    if ($stmt->execute()) {
        echo "First admin created successfully!<br>";
        echo "Email: $email<br>";
        echo "Password: $password<br>"; // Show password only for first-time setup
    } else {
        echo "Error creating first admin: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "Admin already exists.";
}

$conn->close();
?>
