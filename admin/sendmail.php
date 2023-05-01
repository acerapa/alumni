<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';


if(isset($_POST['send'])) {
    $mail = new PHPMailer(true);

    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'graduateemploymenttrackingsyst@gmail.com';
    $mail->Password = 'qgoyzwakvdreihrm';
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;

    $mail->setFrom('graduateemploymenttrackingsyst@gmail.com');
    $mail->addAddress($_POST['email']);

    $mail->isHTML((true));
    $mail->Subject = $_POST['subject'];
    $mail->Body = "Youre account successfully verified you can now access to the system!";
    $mail->send();
    echo "<script>alert('Sent');</script>";
}
header("Location: index.php?page=alumni");
exit;
?>

