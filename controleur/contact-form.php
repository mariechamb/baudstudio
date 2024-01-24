<?php 
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require '../vendor/autoload.php';

// // Instantiation and passing `true` enables exceptions
 $mail = new PHPMailer(true);

 try {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $website = $_POST['website'];
    $message = $_POST['message'];

     //Server settings
     $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
     $mail->isSMTP();                                            // Send using SMTP
     $mail->Host       = 'ssl0.ovh.net';                    // Set the SMTP server to send through
     $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
     $mail->Username   = 'contact@baudstudio.fr';                     // SMTP username
     $mail->Password   = 'gago854RHH';                               // SMTP password
     $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
     $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

     //Recipients
     $mail->setFrom($email, $name);
     $mail->addAddress('contact@baudstudio.fr', 'Marie Chambaud');     // Add a recipient
//     //$mail->addAddress('ellen@example.com');               // Name is optional
//     //$mail->addReplyTo('info@example.com', 'Information');
//     //$mail->addCC('cc@example.com');
//     //$mail->addBCC('bcc@example.com');

//     // Attachments
//     //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//     //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

//     // Content
     $mail->isHTML(true);                                  // Set email format to HTML
     $mail->Subject = 'Demande reçu depuis le site Baudstudio';
     $mail->Body    = 'Envoyé par : ' . $email . '<br> Téléphone : ' . $phone . '<br> Message : ' . $message . '<br>---------------<br>Fin du message';
     $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

     $mail->send();
     echo 'Message envoyé';
     header('Location: ../success-message.php');  
 } catch (Exception $e) {
     echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
 }
 
?>