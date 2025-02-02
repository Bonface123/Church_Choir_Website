<?php
include 'includes/config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $role = $_POST['role'];

    // Check if email already exists
    $checkEmail = "SELECT * FROM members WHERE email = '$email'";
    $result = $conn->query($checkEmail);

    if ($result->num_rows > 0) {
        echo "<p style='color:red;'>Email already registered!</p>";
    } else {
        // Insert into database
        $sql = "INSERT INTO members (name, email, phone, role) 
                VALUES ('$name', '$email', '$phone', '$role')";

        if ($conn->query($sql) === TRUE) {
            echo "<p style='color:green;'>Registration successful!</p>";
        } else {
            echo "<p style='color:red;'>Error: " . $conn->error . "</p>";
        }
    }
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Join the Choir</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <h1>Join the Choir</h1>
    <form method="POST">
        <label>Full Name:</label>
        <input type="text" name="name" required>

        <label>Email:</label>
        <input type="email" name="email" required>

        <label>Phone:</label>
        <input type="text" name="phone" required>

        <label>Choir Role:</label>
        <select name="role" required>
            <option value="Soprano">Soprano</option>
            <option value="Alto">Alto</option>
            <option value="Tenor">Tenor</option>
            <option value="Bass">Bass</option>
        </select>

        <button type="submit">Join Now</button>
    </form>
    <br>
    <a href="index.php">Back to Home</a>
</body>
</html>
