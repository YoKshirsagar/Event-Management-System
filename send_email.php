<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Include PHPMailer library
// require 'vendor/autoload.php'; // Use this if you installed via Composer
require 'src/Exception.php';
require 'src/PHPMailer.php'; // Uncomment if manually downloaded
require 'src/SMTP.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $recipient = filter_var($_POST['recipient'], FILTER_SANITIZE_EMAIL);
    $subject = filter_var($_POST['subject'], FILTER_SANITIZE_STRING);
    $message = filter_var($_POST['message'], FILTER_SANITIZE_STRING);

    if (!filter_var($recipient, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email address.";
        exit;
    }

    $mail = new PHPMailer(true);

    try {
        // SMTP configuration
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com'; // Your SMTP server
        $mail->SMTPAuth = true;
        $mail->Username = ''; // Your email
        $mail->Password = ''; // Your email password or app-specific password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;
        $mail->SMTPDebug = 0; // or PHPMailer::DEBUG_SERVER


        // Email settings
        $mail->setFrom('yogeshkshirsagar393@gmail.com', 'Yogesh'); // Sender email and name
        $mail->addAddress($recipient); // Recipient email
        $mail->Subject = $subject; // Email subject
        $mail->Body = $message; // Email body

        // Send the email
        $mail->send();
        echo "Email sent successfully to $recipient.";
    } catch (Exception $e) {
        echo "Failed to send email. Mailer Error: {$mail->ErrorInfo}";
    }
} else {
    echo "Invalid request method.";
}
