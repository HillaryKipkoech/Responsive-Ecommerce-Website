<?php
/**using phpmailer**/

// mail vendors
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
  use PHPMailer\PHPMailer\SMTP;


require  'assets/vendor/phpmailer/phpmailer/src/Exception.php';
require 'assets/vendor/phpmailer/phpmailer/src/PHPMailer.php';
require 'assets/vendor/phpmailer/phpmailer/src/SMTP.php';

$mail = new PHPMailer(TRUE);
try {
  // introduced if
  if (isset($_POST['submit'])){

    // defining email variable
    $name=($_POST['name']);
   
     $email = ($_POST['email']);
     $subject=($_POST['subject']);
     $message=($_POST['message']);

    // end of variables
  $mail->setFrom ('info@chaniachainsupplies.co.ke');
  $mail->addAddress('kipkoechillary85@gmail.com');
  $mail->Body =  $message ."\r\n";
  $mail->Body .=$email ."\r\n";
  $mail->Body .= $phone ."\r\n";
 
  /* SMTP parameters. */
  
  /* Tells PHPMailer to use SMTP. */
  $mail->isSMTP();
  
  /* SMTP server address. */
  $mail->Host = 'mail.chaniachainsupplies.co.ke';
  /* Use SMTP authentication. */
  $mail->SMTPAuth = TRUE;
  
  /* Set the encryption system. */
  $mail->SMTPSecure = 'tls';
  
  /* SMTP authentication username. */
  $mail->Username = 'info@chaniachainsupplies.co.ke';
  
  /* SMTP authentication password. */
  $mail->Password = 'Dywz8N_%ASNR';
  
  /* Set the SMTP port. */
  $mail->Port = '587';
  
  /* Finally send the mail. */
  $mail->send();
  
  //   trying to use degbug
  $mail->SMTPDebug = SMTP::DEBUG_SERVER;
}

}
catch (\Exception $e)
{
  echo $e->getMessage();
}

?>
