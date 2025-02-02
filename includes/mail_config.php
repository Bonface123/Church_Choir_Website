<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

function sendEmail($to, $subject, $message) {
    $mail = new PHPMailer(true);
    
    try {
        // SMTP Configuration
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com'; // Change based on your SMTP provider
        $mail->SMTPAuth = true;
        $mail->Username = 'your-email@gmail.com'; // Your email
        $mail->Password = 'your-email-password'; // Use App Password if using Gmail
        $mail->SMTPSecure = 'tls'; // Or 'ssl'
        $mail->Port = 587; // 465 for SSL
        
        // Sender & Recipient
        $mail->setFrom('your-email@gmail.com', 'Church Choir Admin');
        $mail->addAddress($to);
        
        // Email Content
        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body    = $message;
        
        $mail->send();
        return true;
    } catch (Exception $e) {
        return false;
    }
}
?>
