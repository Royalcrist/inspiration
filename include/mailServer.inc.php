<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '../PHPMailer/src/Exception.php';
require '../PHPMailer/src/PHPMailer.php';
require '../PHPMailer/src/SMTP.php';

$mailServer = new PHPMailer(true);

//Server config
$mailServer->isSMTP();
$mailServer->Host       = 'smtp.gmail.com';
$mailServer->Port       = '587';
// $mailServer->Port       = '465';
$mailServer->SMTPAuth   = true; 
$mailServer->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
// $mailServer->SMTPSecure = 'ssl';
$mailServer->Username = 'cristiansuarezg7@gmail.com';
$mailServer->Password = '';
$mailServer->setFrom('cristiansuarezg7@gmail.com', 'Test');
$mailServer->addReplyTo('cristiansuarezg7@gmail.com', 'Information');

