<?php
require_once('class.phpmailer.php');

function send_mail($from, $fromName, $to, $subject, $body,  $CC, $BCC, $attachment)
{
    $mail             = new PHPMailer();

    $mail->IsSMTP(); // telling the class to use SMTP
    $mail->SMTPAuth   = true;                          // enable SMTP authentication
    $mail->SMTPSecure = "tls";                         // sets the prefix to the servier
    $mail->Host       = "email-smtp.us-east-1.amazonaws.com";              // sets GMAIL as the SMTP server
    $mail->Port       = 587;                           // set the SMTP port for the GMAIL server
    $mail->Username   = "AKIAW4SQVCR7KQYXU6M3";      // GMAIL username
    $mail->Password   = "BBZMI5zkr3OySsL+456XApxM0bht2AjgjjC/ej4MVpOZ";        // GMAIL password

    //$mail->SetFrom("support@bdtax.com.bd", "BDTax.com.bd ");
    $mail->SetFrom($from, $fromName);
    
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
      return $mail->ErrorInfo;
    } else {
      return "success";
    }
}


?>
