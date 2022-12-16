<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

// function sendMail($receiver, $message,$name){
//     $mail = new PHPMailer(true);

// try {
//     $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
//     $mail->isSMTP();                                            //Send using SMTP
//     $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
//     $mail->SMTPAuth   = true;                                   //Enable SMTP authentication

//     $mail->Username   = 'voguepawners@gmail.com';                     //SMTP username
//     $mail->Password   = 'abuugrshlwzghtwj';                               //SMTP password

//     $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
//     $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

//     //Recipients

//     $mail->setFrom('voguepawners@gmail.com', 'vogue');
//     $mail->addAddress("$receiver", "$name");     //Add a recipient

//     //Content
//     $mail->isHTML(true);                                  //Set email format to HTML
//     $mail->Subject ="Password for VOGUE account";
//     $mail->Body    = "$message";

//     $mail->send();
//     // echo 'Message has been sent';
// } catch (Exception $e) {
//     echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
// }
// }

function sendMail($receiver,$email_Type,$verificatoin_Code){
    $mail = new PHPMailer(true);
    
    try {
        
        switch ($email_Type) {
        case "OTP":
            $mail->Subject ="VOGUE OTP";
            $mail->Body    = "Here is the OTP code $verificatoin_Code";
            break;
        case "registration":
            $link="<a href='http://localhost/Vogue/Login/emailVerify/$verificatoin_Code'>here</a>";
            $mail->Subject ="VOGUE email Verification";
            $mail->Body    = "Thanks for Registering with us.<br> To activate your account click $link";
                break;
        default:
            # code...
            break;
    }


    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication

    $mail->Username   = 'voguepawners@gmail.com';                     //SMTP username
    $mail->Password   = 'abuugrshlwzghtwj';                               //SMTP password

    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients

    $mail->setFrom('voguepawners@gmail.com', 'vogue');
    $mail->addAddress("$receiver", "VOGUE");     //Add a recipient

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
   

    $mail->send();
    // echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
}

function isValidEmail($email)
{
 
    $api_key = "039d8eed2ed64c99ba02b79c13a7b751";

    $ch = curl_init();
    
    curl_setopt_array($ch, [
        CURLOPT_URL => "https://emailvalidation.abstractapi.com/v1?api_key=$api_key&email=$email",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_FOLLOWLOCATION => true
    ]);
    
    $response = curl_exec($ch);
    
    curl_close($ch);
    
    $data = json_decode($response, true);
    
    if ($data['deliverability'] === "UNDELIVERABLE" || $data["is_disposable_email"]["value"] === true) {

        return false;
        
    } 
    return true;
    

}




?>
<!-- abuugrshlwzghtwj -->
