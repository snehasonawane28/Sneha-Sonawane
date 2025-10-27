<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


require 'vendor/autoload.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    $mail = new PHPMailer(true);

    try {
        // SMTP settings
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'snehasonawane509@gmail.com'; // 🔹 your Gmail
        $mail->Password = 'njrdbceqqpbgzfqn'; // 🔹 generated app password
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        // Email details
        $mail->setFrom($email, $name);
        $mail->addAddress('snehasonawane@509gmail.com'); // 🔹 your inbox

        $mail->isHTML(true);
        $mail->Subject = 'New Message from Portfolio Contact Form';
        $mail->Body = "<b>Name:</b> $name <br><b>Email:</b> $email <br><b>Message:</b><br>$message";

        $mail->send();
        echo "✅ Message sent successfully!";
    } catch (Exception $e) {
        echo "❌ Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
?>
