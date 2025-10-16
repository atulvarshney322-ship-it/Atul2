<?php
if (isset($_POST['send'])) {
    // Collect form data
    $name    = $_POST['name'];
    $email   = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    // Receiver Email
    $to = "your_email@example.com";  // 🔴 Replace with your email address

    // Email Subject
    $subject = "New Message from: $name - $subject";

    // Email Body
    $body = "
    <html>
    <head>
      <title>Contact Form Message</title>
    </head>
    <body>
      <h3>Contact Details</h3>
      <p><strong>Name:</strong> {$name}</p>
      <p><strong>Email:</strong> {$email}</p>
      <p><strong>Message:</strong><br>{$message}</p>
    </body>
    </html>
    ";

    // Email Headers
    $headers  = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers .= "From: {$name} <{$email}>" . "\r\n";

    // Send Mail
    if (mail($to, $subject, $body, $headers)) {
        echo "<h2 style='color:green;'>Mail Sent Successfully!</h2>";
    } else {
        echo "<h2 style='color:red;'>Mail Sending Failed.</h2>";
    }
}
?>
