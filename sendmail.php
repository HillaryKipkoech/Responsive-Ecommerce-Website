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
<?php
require 'server.php';
// database
   if (isset($_POST['submit'])) {

        $name = mysqli_real_escape_string($conn, $_POST['name']);
       
        $email=mysqli_real_escape_string($conn, $_POST['email']);
        $subject=mysqli_real_escape_string($conn, $_POST['subject']);
        $message=mysqli_real_escape_string($conn, $_POST['message']);

        // recaptcha
    //     $recaptcha = $_POST['g-recaptcha-response'];
    //     $secret_key = '6LccX9sfAAAAACgiqCrwMuERCw1Eetx0wQd4F4SB';
    //     $url = 'https://www.google.com/recaptcha/api/siteverify?secret='
    //       . $secret_key . '&response=' . $recaptcha;
    //     $response = file_get_contents($url);
    //     $responsekeys = json_decode($response);
    //     if ($responsekeys->success == true) {
    //       echo '<script>alert("Google reCAPTCHA verified")</script>';
    //   } else {
    //       echo '<script>alert("Error in Google reCAPTCHA")</script>';
    //   }

        $sql = "INSERT INTO contacts  VALUES ('$name','$company', '$email','$phone', '$message')";
        mysqli_query($conn, $sql);
      
      session_start();
      $_SESSION['success_message'] = "message send succesfully. We will reach back.";
      header("Location: contact.php");
      exit();
  } else {
      echo "Server problem, Try after sometime.";
  }
     
        
     mysqli_close($conn);
  
    
     ?>

