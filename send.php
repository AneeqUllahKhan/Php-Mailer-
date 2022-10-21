<?Php 
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

//Load Composer's autoloader

if(isset($_POST['send'])){

    $mail = new PHPMailer(true); //Create an instance; passing `true` enables exceptions

    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = '';                     //SMTP username
    $mail->Password   = '';                               //SMTP password
    $mail->SMTPSecure = 'ssl';            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    $mail->setFrom('');
    $mail->addAddress($_POST["email"]);     //Add a recipient
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = $_POST["subject"];
    $mail->Body    = $_POST["message"];
    $mail->send();
    echo " <script>
    alert('Done');
    document.location.href='index.php';
    </script>";

}
