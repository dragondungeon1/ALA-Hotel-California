<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/stylesheet.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300&display=swap" rel="stylesheet">
    <title>Booking</title>
</head>
<body>
<span style="font-size:30px;cursor:pointer; text-align: center" onclick="openNav()">&#9776; Navigation</span>
<div id="myNav" class="overlay">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    <div class="overlay-content">
        <img style="width: 100px; height: 100px" src="../img/logo2.jpg" alt="">
        <a href="../index.php">Home</a>
        <a href="index.php">Rooms</a>
        <a href="../accommodations.php">Accomodations</a>
        <a href="#">Contact</a>
    </div>
</div>
<script>
    function openNav() {
        document.getElementById("myNav").style.height = "100%";
    }

    function closeNav() {
        document.getElementById("myNav").style.height = "0%";
    }
</script>
</body>
</html>
<div style="text-align: center">
<?php

require_once "functions.php";

$roomDetails = getRoomDetails($_POST['room'], $conn);
$catDetail = getCategorieDetails($roomDetails['categorie_id'] ,$conn);
?>

<h1>Book now room number <?=$roomDetails['room_number']?> </h1>
    <br>

<?php
$stmt = $conn->prepare('SELECT * FROM seasons');
$stmt->execute();

while($seasonRow = $stmt->fetch(PDO::FETCH_ASSOC)){
    if(checkSeasonDate($seasonRow['startDate'], $seasonRow['endDate'], $_POST['start_date'])){
        echo 'It is   ' .$seasonRow['naam'] . ' now so we calculate the fee with ' . $seasonRow['pricePercentage'] . '%';
        echo '<br>The price in the ' . $seasonRow['naam'] . ' is $' .($catDetail['price'] / 100 ) * $seasonRow['pricePercentage'];
        break;
    }
}
?>

<!--<div class="" style="text-align: center">-->
<!--    <b>The room you choose:</b> <br>-->
<!--    <b>The price you will have to pay:</b> <br>-->
<!--    <b>The date you selected:</b> <br>-->
<!--    <div class="card">-->
<!--        <h3>Please fill in your creditials</h3>-->
<!--        <form method="post" action="thankyou.php" >-->
<!--            <label for="details">Contact details</label> <br>-->
<!--            <label for="fname">First name</label>-->
<!--            <input type="text" id="voornaam" name="firstname" placeholder="firs tname"> <br>-->
<!---->
<!--            <label for="lname">Last name</label>-->
<!--            <input type="text" id="achternaam" name="lastname" placeholder="last name"> <br>-->
<!---->
<!--            <label for="country">Country</label>-->
<!--            <select id="country" name="country">-->
<!--                <option value="australia">Australia</option>-->
<!--                <option value="canada">Canada</option>-->
<!--                <option value="usa">USA</option>-->
<!--            </select> <br>-->
<!---->
<!--            <label for="mail">E mail</label>-->
<!--            <input type="text" id="mail" name="mail" placeholder="e-mail"> <br>-->
<!---->
<!--            <label for="adress">Adress</label>-->
<!--            <input type="text" id="adress" name="firstname" placeholder="adress"> <br>-->
<!---->
<!--            <label for="postalcode">Postalcode</label>-->
<!--            <input type="text" id="postal" name="postal" placeholder="postalcode"> <br>-->
<!--            <input class="button-primary" type="submit" value="test">-->
<!--        </form>-->
<!--    </div>-->
<!--</div>-->

<div>
<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../PHPMailer/src/Exception.php';
require '../PHPMailer/src/PHPMailer.php';
require '../PHPMailer/src/SMTP.php';

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
        $mail->Password = '';
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587 ;

        /* Set the mail sender. */
        $mail->setFrom('lennartderidder@gmail.com', 'Lennart de Ruiter');

        /* Add a recipient. */
        $mail->addAddress($_POST['emailto'], $_POST['emailtoname']);

        /* Set the subject. */
        $mail->Subject = 'Hotel confirmation email';

        /* Set the mail message body. */
        $mail->Body = 'Dear customer, You have made an reservation for:' . $_POST['datum'];

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
<!--    <h1>Boek hotel</h1>-->
    <form method="post">
        <label for="datum">Start date</label><br />
        <input type="date" id="datum" name="datum" /><br /><br />

        <label for="datum">End Date</label><br />
        <input type="date" id="datum" name="datum" /><br /><br />

        <label for="emailto">Wat is uw email?</label><br />
        <input type="email" id="emailto" name="emailto" placeholder="voorbeeld@demo.nl" /><br /><br />

        <label for="emailtoname">Wat is uw naam?</label><br />
        <input type="text" id="emailtoname" name="emailtoname" placeholder="Piet Janssen" /><br /><br />

        <input  type="submit" value="Verstuur bevestiging"/>
    </form>
    <?php
}
?>
</div>