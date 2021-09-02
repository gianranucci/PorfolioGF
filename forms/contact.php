
<?php



 require '../PHPMailer/Exception.php';
 require '../PHPMailer/PHPMailer.php';
 require '../PHPMailer/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$nombre = $_POST['name'];
$email = $_POST['email'];
$tel = $_POST['tel'];
$subject = $_POST['subject'];
$mensaje = $_POST['message'];

$body = "Nombre: <br>" . $nombre  ." <br> Correo: <br>" . $email . "<br> Tel: " .$tel ."<br>Asunto: <br>" . $subject . "Mensaje: <br>" . $mensaje; 
$mail = new PHPMailer();

try {
    //Server settings
    $mail->SMTPDebug = 0;
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'gfdevelopm@gmail.com';                     //SMTP username
    $mail->Password   = 'gfranco_22';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('gfdevelopm@gmail.com', $nombre);
    $mail->addAddress('gfdevelopm@gmail.com');     //Add a recipient
    

    
    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = $subject;
    $mail->Body    = $body;
    $mail->CharSet = 'UTF-8';
   
    
    $mail->send();
    echo '<script>alert("El mensaje se envio correctamente");
    window.history.go(-1);
    </script>';
    
} catch (Exception $e) {
    echo "Hubo un error: {$mail->ErrorInfo}";
}
?>