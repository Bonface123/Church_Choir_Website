<?php
include 'includes/config.php';
include 'includes/mail_config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $role = $_POST['role'];

    // Insert into database
    $sql = "INSERT INTO members (name, email, phone, role, status) VALUES ('$name', '$email', '$phone', '$role', 'Pending')";
    if ($conn->query($sql) === TRUE) {
        
        // Send Email Notification to Admin
        $admin_email = "admin@churchchoir.com";
        $subject = "New Choir Membership Application";
        $message = "<p>A new member has applied to join the choir:</p>
                    <p><strong>Name:</strong> $name</p>
                    <p><strong>Email:</strong> $email</p>
                    <p><strong>Phone:</strong> $phone</p>
                    <p><strong>Role:</strong> $role</p>
                    <p>Please log in to approve or reject the request.</p>";

        sendEmail($admin_email, $subject, $message);
        
        echo "<p style='color:green;'>Registration successful! You will be notified once approved.</p>";
    } else {
        echo "<p style='color:red;'>Error: " . $conn->error . "</p>";
    }
}
?>
