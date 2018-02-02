<?php
/**
 * Created by PhpStorm.
 * User: Tolya
 * Date: 29.01.2018
 * Time: 0:07
 */

$cfg = require '../data/cfg/config.php';
$langPack = require '../data/cfg/lang.php';
$lang='pl';
$langPack=$langPack[$lang];
$emailSent = '';

if(trim($_POST['name']) == '')  { $hasError = true;   } else { $username = trim($_POST['name']); }
if(trim($_POST['email']) == '') { $hasError = true;   } else { $usermail = trim($_POST['email']); }
if(trim($_POST['phone']) == '') { $usertel  = 'none'; } else { $usertel  = trim($_POST['phone']); }
if(trim($_POST['message']) == '') { $hasError = true; }
else {
    if(function_exists('stripslashes')) { $comments = stripslashes(trim($_POST['message'])); }
    else { $comments = trim($_POST['message']); }
}

if(!isset($hasError)) {
    $sendto   = $cfg['form']['to'];

    // creating headers
    $subject  = $cfg['form']['subject'];
    $headers  = "From: "    . strip_tags($usermail) . "\r\n";
    $headers .= "Reply-To: ". strip_tags($usermail) . "\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html;charset=utf-8 \r\n";

    // creating the message body
    $msg  = "<html><body style='font-family:Arial,sans-serif;'>";
    $msg .= "<h2 style='font-weight:bold;border-bottom:1px dotted #ccc;'>Cообщение с сайта</h2>\r\n";
    $msg .= "<p><strong>От:</strong> ".$username."</p>\r\n";
    $msg .= "<p><strong>Почта:</strong> ".$usermail."</p>\r\n";
    $msg .= "<p><strong>Phone number:</strong> ".$usertel."</p>\r\n\n";
    $msg .= $comments;
    $msg .= "</body></html>";

    // sending the message
    $success = mail($sendto, $subject, $msg, $headers);
    if ($success && $hasError != true ){ $emailSent = 'success'; }
    else { $emailSent = "<pre>".strip_tags($success)."</pre>" ; }

}
echo $emailSent;

