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

    $mail->send();
    echo 'Mail sent successfully';
} catch (Exception $e) {
    echo "Mail sending failed. Error: {$mail->ErrorInfo}";
}
}
?>
