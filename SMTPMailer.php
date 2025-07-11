<?php
require 'vendor/autoload.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Sanitize inputs
    $email = filter_var($_POST['emails'], FILTER_SANITIZE_EMAIL);
    $subject = htmlspecialchars($_POST['subject']);
    $message = htmlspecialchars($_POST['message']);
    
    $mail = new PHPMailer\PHPMailer\PHPMailer(true);
    
    try {
        // Server settings
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'youthwebdonotreply@gmail.com';
        $mail->Password   = 'usfyqiczhkgpijci'; // Replace with App Password if 2FA enabled
        $mail->SMTPSecure = PHPMailer\PHPMailer\PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587;
        $mail->SMTPDebug  = 0; // Set to 2 for debugging
        
        // Recipients
        $mail->setFrom('youthwebdonotreply@gmail.com', 'Youth Website');
        $mail->addAddress($email);
        
        // Content
        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body    = $message;
        
        // Important headers to prevent spam marking
        $mail->addCustomHeader('Precedence', 'bulk');
        $mail->addCustomHeader('X-Entity-Ref-ID', uniqid());
        
        $mail->send();
        echo "success";
    } catch (Exception $e) {
        // Improved error handling
        $error = "Message could not be sent. Mailer Error: " . $e->getMessage();
        
        // Log the error (create 'logs' directory first)
        file_put_contents('logs/email_errors.log', date('Y-m-d H:i:s') . " - $error\n", FILE_APPEND);
        
        // User-friendly message
        echo "Email delivery failed. Our team has been notified.";
    }
}