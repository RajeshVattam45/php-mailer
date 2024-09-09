<?php

session_start();

// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function.
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

if (isset($_POST['submit'])) {

    $name = $_POST['full_name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    // Create an instance; passing `true` enables exceptions.
    $mail = new PHPMailer(true);

    try {
        // Server settings.
        //Send using SMTP
        $mail->isSMTP();
        //Set the SMTP server to send through
        $mail->Host = 'smtp.gmail.com';
        //Enable SMTP authentication
        $mail->SMTPAuth  = true;
        //SMTP username
        $mail->Username = 'vattamrajesh45@gmail.com';
        //SMTP password
        $mail->Password = 'wfcl clfv xtic zdwc';
        //$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS - Enable implicit TLS encryption
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        //TCP port to connect to; use 465 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
        $mail->Port = 587;

        // Recipients
        $mail->setFrom('vattamrajesh45@gmail.com', 'From Mail');
        // Add a recipient
        $mail->addAddress('vattamrajesh45@gmail.com', 'From admin to user');

        // Content.
        // Set email format to HTML
        $mail->isHTML(true);
        $mail->Subject = 'New Enquiry - From admin';
        $mail->Body = '<h3>You got a new enquiry</h3>
                            <h4>Full Name: ' . $name . '</h4>
                            <h4>Email: ' . $email . '</h4>
                            <h4>Subjaect: ' . $subject . '</h4>
                            <h4>Message: ' . $message . '</h4>';
        if ($mail->send()) {
            $_SESSION['status'] = "Thank Yot for contacting us";
            header("Location: {$_SERVER['HTTP_REFERER']}");
            exit(0);
        }
        else {
            $_SESSION['status'] = "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            header("Location: {$_SERVER['HTTP_REFERER']}");
            exit(0);
        }
    }
    catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
else {
    $_SESSION['status'] = "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    header("Location: {$_SERVER['HTTP_REFERER']}");
    exit(0);
}
