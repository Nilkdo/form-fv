<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/PHPMailer/src/Exception.php';
require 'PHPMailer/PHPMailer/src/PHPMailer.php';
require 'PHPMailer/PHPMailer/src/SMTP.php';
188;



$connect = mysqli_connect('localhost', 'admin', '12345', 'formulario');

$email = isset( $_POST['email'] ) ? $_POST['email'] : '';
$message = isset( $_POST['message'] ) ? $_POST['message'] : '';

$email_error = '';
$message_error = '';

if (count($_POST))
{ 
    $errors = 0;

    if ($_POST['email'] == '')
    {
        $email_error = 'Please enter an email address';
        $errors ++;
    }

    if ($_POST['message'] == '')
    {
        $message_error = 'Please enter a message';
        $errors ++;
    }

    if ($errors == 0)
    {

        $query = 'INSERT INTO contacto (
                email,
                mensaje
            ) VALUES (
                "'.addslashes($_POST['email']).'",
                "'.addslashes($_POST['message']).'"
            )';
        mysqli_query($connect, $query);

        $message = 'You have received a contact form submission';
            
//Email: '.$_POST['email'].'
//Message: '.$_POST['email'];


$email = new PHPMailer();
try{

$email = new PHPMailer();
$email->isSMTP();
$email->Host = 'smtp.mailtrap.io';
$email->SMTPAuth = true;
$email->Port = 2525;
$email->Username = 'bc7e5e699c184c';
$email->Password = '3a8b17d95a14a6';

$email->setFrom('nicolas02m@gmail.com');
$email->addAddress('nicolap02m@gmail.com');

$email->isHTML(true);
$email->Subject ='contacto desde el formulario';
$email->Body    = $message ;
$email->AltBody ='Este es el contenido del mensaje en texto plano';

$email->send();
echo'El mensaje ha sido enviado';
}catch(Exception $e) {
    echo'el mensaje no se a podido enviar',$email->ErrorInfo;
}

    }
}

?>
<!doctype html>
<html>
    <head>
        <title>PHP Contact Form</title>
    </head>
    <body>
    
        <h1>PHP Contact Form</h1>

        <form method="post" action="">
        
            Email Address:
            <br>
            <input type="text" name="email" value="<?php echo $email; ?>">
            <?php echo $email_error; ?>

            <br><br>

            Message:
            <br>
            <textarea name="message"><?php echo $message; ?></textarea>
            <?php echo $message_error; ?>

            <br><br>

            <input type="submit" value="Submit">
        
        </form>
    
    </body>
</html>
