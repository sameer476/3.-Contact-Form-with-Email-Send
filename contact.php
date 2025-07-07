<?php
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $name    = $_POST['name'];
    $email   = $_POST['email'];
    $message = $_POST['message'];

    $to      = "your-email@example.com";  // 👈 Apna email yahan likho
    $subject = "New Contact Message from $name";
    $body    = "Name: $name\nEmail: $email\nMessage: $message";
    $headers = "From: $email";

    if (mail($to, $subject, $body, $headers)) {
        echo "✅ Message Sent Successfully!";
    } else {
        echo "❌ Failed to Send Message.";
    }
}
?>

<h2>Contact Us</h2>
<form method="post">
    Name: <input type="text" name="name" required><br><br>
    Email: <input type="email" name="email" required><br><br>
    Message:<br>
    <textarea name="message" rows="5" required></textarea><br><br>
    <button type="submit">Send Message</button>
</form>
