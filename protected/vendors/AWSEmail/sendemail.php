<?php
require_once('class.phpmailer.php');

function send_mail($to, $subject, $body,  $CC, $BCC, $attachment)
{
    $mail             = new PHPMailer();

    $mail->IsSMTP(); // telling the class to use SMTP
    $mail->SMTPAuth   = true;                          // enable SMTP authentication
    $mail->SMTPSecure = "ssl";                         // sets the prefix to the servier
    $mail->Host       = "smtp.gmail.com";              // sets GMAIL as the SMTP server
    $mail->Port       = 465;                           // set the SMTP port for the GMAIL server
    $mail->Username   = "dawor.info@gmail.com";      // GMAIL username
    $mail->Password   = "D@w0r-!nf0";        // GMAIL password

    $mail->SetFrom("dawor.info@gmail.com", "Auth Admin");
    
    $mail->Subject    = $subject;

    $mail->AltBody    = "To view the message, please use an HTML compatidble email viewer!"; // optional, comment out and test

    $mail->MsgHTML($body);

    $address = $to;
    $allTo = explode(";", $to);
    for($i = 0; $i < count($allTo); $i++) $mail->AddAddress(trim($allTo[$i]));
    
    if(isset($CC) && $CC != "")
    {
        $allCC = explode(";", $CC);
        for($i = 0; $i < count($allCC); $i++) $mail->AddCC(trim($allCC[$i]));
    }
    
    if(isset($BCC) && $BCC != "")
    {
        $allBCC = explode(";", $BCC);
        for($i = 0; $i < count($allBCC); $i++) $mail->AddBCC(trim($allBCC[$i]));
    }
    
    if($attachment != "")
    {
        $mail->AddAttachment($attachment);
    }

    if(!$mail->Send()) {
      //return "Mailer Error: " . $mail->ErrorInfo;
      return false;
    } else {
      return true;
    }
}


?>
