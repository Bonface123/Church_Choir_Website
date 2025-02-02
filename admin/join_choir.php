if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $role = $_POST['role'];

    // Insert into database
    $sql = "INSERT INTO members (name, email, phone, role, status) VALUES ('$name', '$email', '$phone', '$role', 'Pending')";
    if ($conn->query($sql) === TRUE) {
        
        // Send Admin Notification Email with HTML Template
        $admin_email = "admin@churchchoir.com";
        $subject = "New Choir Membership Application";
        $message = newMemberRegistrationEmail($name, $email, $phone, $role);
        
        sendEmail($admin_email, $subject, $message);
        
        echo "<p style='color:green;'>Registration successful! You will be notified once approved.</p>";
    } else {
        echo "<p style='color:red;'>Error: " . $conn->error . "</p>";
    }
}
