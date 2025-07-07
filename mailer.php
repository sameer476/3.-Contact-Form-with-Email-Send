<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $name    = $_POST['name'];
    $email   = $_POST['email'];
    $message = $_POST['message'];

    $mail = new PHPMailer(true);

    try {
        // Server settings
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'your-email@gmail.com';       // 👈 Apna Gmail
        $mail->Password   = 'your-app-password';          // 👈 App password
        $mail->SMTPSecure = 'tls';
        $mail->Port       = 587;

        // Recipients
        $mail->setFrom($email, $name);
        $mail->addAddress('your-email@gmail.com');        // 👈 Jisko bhejna hai

        // Content
        $mail->isHTML(true);
        $mail->Subject = 'New Contact Message';
        $mail->Body    = "Name: $name <br>Email: $email <br>Message: $message";

        $mail->send();
        echo "✅ Email Sent Successfully!";
    } catch (Exception $e) {
        echo "❌ Email could not be sent. Error: {$mail->ErrorInfo}";
    }
}
?>

<h2>Contact Form (PHPMailer)</h2>
<form method="post">
    Name: <input type="text" name="name" required><br><br>
    Email: <input type="email" name="email" required><br><br>
    Message:<br>
    <textarea name="message" rows="5" required></textarea><br><br>
    <button type="submit">Send Message</button>
</form>
