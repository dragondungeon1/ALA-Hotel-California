<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

if(isset($_POST['emailto']) && isset($_POST['emailtoname'])&& isset($_POST['datum'])){
    /* Create a new PHPMailer object. Passing TRUE to the constructor enables exceptions. */
    $mail = new PHPMailer(TRUE);

    /* Open the try/catch block. */
    try {
        /*SMTP instellingen */
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = '';
        $mail->Password = $secretpasswordwesley;
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587 ;

        /* Set the mail sender. */
        $mail->setFrom('hier komt je gmail email adres', 'hier komt je naam');

        /* Add a recipient. */
        $mail->addAddress($_POST['emailto'], $_POST['emailtoname']);

        /* Set the subject. */
        $mail->Subject = 'Hotel bevestiging reservering';

        /* Set the mail message body. */
        $mail->Body = 'Beste klant, U hebt gereserveerd op:' . $_POST['datum'];

        /* Finally send the mail. */
        $mail->send();
    }
    catch (Exception $e)
    {
        /* PHPMailer exception. */
        echo $e->errorMessage();
    }
    catch (\Exception $e)
    {
        /* PHP exception (note the backslash to select the global namespace Exception class). */
        echo $e->getMessage();
    }
}else{
    ?>
    <h1>Boek hotel</h1>
    <form method="post">
        <label for="datum">Start date</label><br />
        <input type="date" id="datum" name="datum" /><br /><br />
        <label for="datum">End Date</label><br />

        <input type="date" id="datum" name="datum" /><br /><br />
        <label for="emailto">Wat is uw email?</label><br />
        <input type="email" id="emailto" name="emailto" placeholder="voorbeeld@demo.nl" /><br /><br />
        <label for="emailtoname">Wat is uw naam?</label><br />
        <input type="text" id="emailtoname" name="emailtoname" placeholder="Piet Janssen" /><br /><br />
        <input type="submit" value="Verstuur bevestiging"/>
    </form>
    <?php
}
