<?php 

require "vendor/autoload.php";

use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\SMTP;

function SendMail($subject, $body, $email, $name, $html = false)
{
  $phpmailer = new PHPMailer();
  $phpmailer->isSMTP();
  $phpmailer->Host = 'smtp.gmail.com';
  $phpmailer->SMTPAuth = true;
  $phpmailer->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; 
  $phpmailer->Port = 465;
  $phpmailer->Username = '';  // Put your email.
  $phpmailer->Password = '';  // Put you email password. Search on the internet how to do this.
  $phpmailer->CharSet = 'UTF-8';
  $phpmailer->setFrom($email, $name);
  $phpmailer->addAddress($email, $name);

  $phpmailer->isHTML($html);
  $phpmailer->Subject = $subject;
  $phpmailer->Body = $body;

  $phpmailer->send();
}