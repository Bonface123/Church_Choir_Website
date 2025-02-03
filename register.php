<?php
include 'includes/config.php';
include 'includes/email.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $role = $_POST['role'];

    // Insert into database (status = Pending)
    $sql = "INSERT INTO members (name, email, phone, role, status) VALUES ('$name', '$email', '$phone', '$role', 'Pending')";
    
    if ($conn->query($sql)) {
        // Send Welcome Email
        $subject = "Welcome to the Church Choir!";
        $body = "<h2>Hello $name,</h2>
                 <p>Thank you for registering for our church choir! Your application is pending approval. We will notify you once it's approved.</p>
                 <p>God bless you!</p>";
        sendEmail($email, $subject, $body);

        echo "Registration successful! Check your email.";
    } else {
        echo "Error: " . $conn->error;
    }
}

$conn->close();
?>
