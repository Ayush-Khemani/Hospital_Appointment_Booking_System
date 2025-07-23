<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;



    $Pname = $_POST['fullname'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $date = $_POST['date'];
    $doctor = $_POST['doctor'];
    $time = $_POST['time'];



//Load Composer's autoloader
require 'PHP Mailer/PHPMailer.php';
require 'PHP Mailer/Exception.php';
require 'PHP Mailer/SMTP.php';


//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
                        //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = '';                     //SMTP username
    $mail->Password   = 'hvnr ceok scmd kjhx';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('', 'Appointment Booking');
    $mail->addAddress('', 'Ayush Khemani');     //Add a recipient
    
   
    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Appointment Booking';
    $mail->Body    = "Patient: $Pname <br> Age: $age <br> Gender: $gender <br>Doctor: $doctor <br>Time: $time <br>Date: $date";
   

    $mail->send();
    echo 'Your Appointment has been booked';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

header("location: sucess.php");
exit;

