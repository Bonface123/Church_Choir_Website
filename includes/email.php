<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../vendor/autoload.php';

function sendEmail($to, $subject, $body) {
    $mail = new PHPMailer(true);

    try {
        // SMTP Configuration
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';  // Change if using another provider
        $mail->SMTPAuth = true;
        $mail->Username = 'your-email@gmail.com';  // Change to your email
        $mail->Password = 'your-email-password';  // Change to your app password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        // Email Content
        $mail->setFrom('your-email@gmail.com', 'Church Choir');
        $mail->addAddress($to);
        $mail->Subject = $subject;
        $mail->Body = $body;
        $mail->isHTML(true);

        $mail->send();
        return true;
    } catch (Exception $e) {
        return false;
    }
}
?>
