<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST["name"]);
    $email = htmlspecialchars($_POST["email"]);
    $amount = htmlspecialchars($_POST["amount"]);
    $payment_method = htmlspecialchars($_POST["payment_method"]);

    $to = "crownmisterschoir@gmail.com";
    $subject = "New Donation from " . $name;
    $headers = "From: " . $email . "\r\n";
    $headers .= "Reply-To: " . $email . "\r\n";

    $body = "Name: $name\n";
    $body .= "Email: $email\n";
    $body .= "Donation Amount: KSh $amount\n";
    $body .= "Payment Method: $payment_method\n\n";

    if (mail($to, $subject, $body, $headers)) {
        echo "<script>alert('Thank you for your donation! We appreciate your support.'); window.location.href='donate.php';</script>";
    } else {
        echo "<script>alert('Donation submission failed. Please try again.'); window.location.href='donate.php';</script>";
    }
}
?>
