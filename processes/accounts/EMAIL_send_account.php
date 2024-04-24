<?php
session_start();
//Load Composer's autoloader
require '../../vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;




//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

$userInfo = $_SESSION['user_info'];
$email = $userInfo['email'];
$code = $userInfo['code'];

try {
      //Server settings
      $mail->isSMTP();
      $mail->Host = 'smtp.gmail.com';
      $mail->SMTPAuth = true;
      $mail->Username = 'spjpawaki02@gmail.com';
      $mail->Password = 'kvok brcn pxgi rkyp';
      $mail->SMTPSecure = 'tls';
      $mail->Port = 587;
      $mail->setFrom('spjpawaki02@gmail.com', 'Email Provider Service');
  
  
      $mail->addAddress($email);     //Add a recipient
  
      $mail->AddEmbeddedImage('media/1.png', 'pic');
  
  
      //Content
      $mail->isHTML(true);                                  //Set email format to HTML
      $mail->Subject = 'SEVERABS - Account Confirmation';
      $mail->Body = '
      <html>
          <body style="background-color:#5b175d; color: white; width: 65%; padding:10px;">
              <img src="cid:pic"
                  style="width: 100%; height: auto; display: flex; justify-content: center;">
              <div class="container" style="text-align: center;">
                  <h2>Welcome to </h2>
                  <h1>S E V E R A B S!</h1>
                  <p>Severabs is your one-stop shop for all your spiritual and wellness needs. 
                      Whether you\'re looking for tarot cards, crystals, or spiritual guidance, 
                      we\'ve got you covered. Our extensive collection of products and services is 
                      designed to help you on your journey to self-discovery and personal growth. 
                      Explore our site to find the tools and resources 
                      you need to nurture your mind, body, and soul. Welcome to the Severabs community!</p>
                      <hr style="width:50%; margin-top:20px;margin-bottom:20px;">
                      <h2>ACCOUNT ACTIVATION</h2>
      
                      <p>Currently, your email, ' . $email . ', has been used for registration purposes as a customer to our shop - click this <a href="http://localhost/web%20projects/Severabs/htdocs/processes/accounts/confirm_account.php?email=' . $email . '&code='.$code.'" style="color:white">link</a> to activate your account!
                          </p>
                          <p>  if this wasn\'t done by you,
                          please ignore this message.
                      </p>
                      <hr style="width:50%; margin-top:20px;margin-bottom:20px;">
                      <div class="spacer" style="margin-top:50px"></div>
                      <h5>2024 SEVERABS </h5>
              </div>
          </body>
      </html>';
      
      $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
  
      $mail->send();
      echo 'Message has been sent';
} catch (\Throwable $th) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

$_SESSION['STATUS'] = 'ACCOUNT_CREATION';
header("Location: ../../index.php");
?>