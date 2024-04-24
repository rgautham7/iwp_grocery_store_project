<?php
include("db.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    // Configure SMTP settings
    $smtpHost = 'smtp.gmail.com';
    $smtpPort = 587;
    $smtpUsername = 'your_email@gmail.com'; // Your Gmail address
    $smtpPassword = 'your_password'; // Your Gmail password

    // Compose the email
    $to = "contact@gmail.com";
    $subject = "Message from $name";
    $body = "Name: $name\n";
    $body .= "Email: $email\n";
    $body .= "Message:\n$message";

    // Send the email using PHPMailer library (you need to download and include PHPMailer)
    require 'path/to/PHPMailer/src/PHPMailer.php';
    require 'path/to/PHPMailer/src/SMTP.php';

    $mail = new PHPMailer\PHPMailer\PHPMailer();
    $mail->isSMTP();
    $mail->Host = $smtpHost;
    $mail->Port = $smtpPort;
    $mail->SMTPAuth = true;
    $mail->Username = $smtpUsername;
    $mail->Password = $smtpPassword;
    $mail->setFrom($smtpUsername);
    $mail->addAddress($to);
    $mail->Subject = $subject;
    $mail->Body = $body;

    if ($mail->send()) {
        echo "Email sent successfully!";
    } else {
        echo "Failed to send email. Please try again later.";
    }
} else {
    // Handle if the form is accessed directly without POST request
    echo "Access denied!";
}
?>
