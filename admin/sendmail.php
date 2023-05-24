<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

if(isset($_POST['email'])) {
    $mail = new PHPMailer(true);

    $mail->isSMTP();
    $mail->Host = 'smtp-relay.sendinblue.com';
    // $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'projectdev751@gmail.com';
    // $mail->Username = 'graduateemploymenttrackingsyst@gmail.com';
    $mail->Password = 'ZxCpGXLg3n105NQj';
    // $mail->Password = 'qgoyzwakvdreihrm';
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;

    $mail->setFrom('projectdev751@gmail.com');
    $mail->addAddress($_POST['email']);

    $mail->isHTML((true));
    $mail->Subject = isset($_POST['subject']) ? $_POST['subject'] : "Verified Account!";
    $mail->Body = "Youre account successfully verified you can now access to the system!";
    $dd = $mail->send();
    echo "<script>alert('Sent');</script>";
}
// header("Location: index.php?page=alumni");
exit;
?>

