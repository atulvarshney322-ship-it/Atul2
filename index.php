<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

$mail = new PHPMailer(true);

if (isset($_POST['send'])) {
    // Collect form data
    $name    = $_POST['name'];
    $email   = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];
    
    try {
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'atulvarshney5577@gmail.com';
    $mail->Password = 'Atulvarshney@5577#';
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;
        
    $mail->setFrom('atulvarshney5577@gmail.com', 'Mailer');
    $mail->addAddress('atulvarshney5577@gmail.com');
    $mail->Subject = 'Test Mail';
    $mail->Body    = 'This is a test message.';
        echo $name;
    $mail->send();
    echo 'Mail sent successfully';
} catch (Exception $e) {
    echo "Mail sending failed. Error: {$mail->ErrorInfo}";
}
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Contact Form</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background: #f4f4f4;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }
    form {
      background: #fff;
      padding: 25px;
      border-radius: 10px;
      box-shadow: 0 4px 10px rgba(0,0,0,0.1);
      width: 350px;
    }
    input, textarea, button {
      width: 100%;
      margin-bottom: 15px;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 6px;
      font-size: 14px;
    }
    button {
      background: #28a745;
      color: white;
      border: none;
      cursor: pointer;
    }
    button:hover {
      background: #218838;
    }
  </style>
</head>
<body>

  <form  method="POST">
    <h2>Contact Us</h2>
    <input type="text" name="name" placeholder="Your Name" required />
    <input type="email" name="email" placeholder="Your Email" required />
    <input type="text" name="subject" placeholder="Subject" required />
    <textarea name="message" placeholder="Your Message" rows="5" required></textarea>
    <input type="submit" name="send" value="send">
  </form>

</body>
</html>
