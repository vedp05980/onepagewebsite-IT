<?php

    

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
// email Or Phone validation

if(!empty($_POST['email'])) {

if (!filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)) {
    echo "Please provide a valid email-id";
    return;
}
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$subject = $_POST['subject'];
// $subject = $_POST['subject'];
$msg = $_POST['message'];

$phone = isset($_POST['phone']) ? $_POST['phone'] : 'Akhand';



    
    
/********************Sending Email******************************************/

$mail = new PHPMailer(true);  // Passing `true` enables exceptions
try {
    //Server settings
    // $mail->SMTPDebug = 2;                                 // Enable verbose debug output
    $mail->isSMTP();    
                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'adarsh.gokula@gmail.com';                 // SMTP username
    $mail->Password = '9801039962';                           // SMTP password
    $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 465;                                    // TCP port to connect to
    //Recipients
    // enquiry@connectinfosys.com
    $mail->setFrom('adarsh.gokula@gmail.com', 'IDASOA');
    $mail->addAddress('adarsh.gokula@gmail.com');     // Add a recipient
    $mail->addAddress('adarsh.gokula@gmail.com');
    $mail->isHTML(true); 
    $mail->Body.='<html lang="en">';
    $mail->Body.='<head>';
    $mail->Body.='<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">';
    $mail->Body.='</head>';
    $mail->Body.='<body style="font-family: candara;height:auto;">';    
    $mail->Body.='<div style="background-color: #2c57e4; padding:1%;margin:0;border-radius:2px">';
    $mail->Body.='<p style="color: #fff; text-align: center; font-size: 45px;font-weight:600;margin:0">Welcome to <span style="font-size:55px">Akhand</span></p>';
    $mail->Body.='</div>';
    $mail->Body.='<div style="border: 5px solid #2c57e4;border-top: none;">';
    $mail->Body.='<div style="padding: 1% 3%;margin: 0 0 1% 0">';
    $mail->Body.='<p style="font-size: 25px;text-align: center;text-transform:capitalize;font-weight: 800;margin:0">Contact Form</p>';
    $mail->Body.='<p style="font-size: 16px;"><strong>Hello </strong>Akhand,</p>';
    $mail->Body.='<p style="font-size: 16px;">Someone has tried to contact Akhand team.</p>';
    $mail->Body.='<p style="font-size: 16px;">Name:'.@$name.'</p>';
    $mail->Body.='<p style="font-size: 16px;">Email:'.@$email.'</p>';
    $mail->Body.='<p style="font-size: 16px;">Phone:'.@$phone.'</p>';
    // $mail->Body.='<p style="font-size: 16px;">Subject:'.@$subject.'</p>';
    $mail->Body.='<p style="font-size: 16px;">Message Detail:'.@$msg.'</p>';

    $mail->Body.='<p style="font-size: 16px;">Cheers!</p>';
    $mail->Body.='<p style="font-size: 16px;">Akhand</p>';
    $mail->Body.='</div>';
    $mail->Body.='</div>';
    $mail->Body.='</body>';
    $mail->Body.='</html>';
    $mail->Subject = 'Akhand';
    $mail->send();
    echo '1';
} catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}

}else{
    echo "mail not provide";
}
?>