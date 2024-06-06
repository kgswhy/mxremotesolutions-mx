<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../vendor/autoload.php'; // Path ke file autoload.php dari PHPMailer

// Function to send email
function sendEmail($to, $subject, $message, $headers) {
    $mail = new PHPMailer(true); // Passing `true` enables exceptions

    try {
        //Server settings
        $mail->SMTPDebug = 0; 
        $mail->isSMTP();
        $mail->Host = 'mail.mxsolution.id';
        $mail->SMTPAuth = true;
        $mail->Username = 'wahyu@mxsolution.id';
        $mail->Password = '=HVx=459UAfx'; 
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;

        $mail->setFrom('wahyu@mxsolution.id', 'MxRemoteSolutions');
        $mail->addAddress($to); // Alamat email penerima

        $mail->isHTML(false); 
        $mail->Subject = $subject; 
        $mail->Body    = $message; 

        $mail->send(); 
        return true;
    } catch (Exception $e) {
        return false;
    }
}
?>
