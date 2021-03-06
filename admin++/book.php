<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/stylesheet.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300&display=swap" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/2.0.2/anime.min.js"></script>

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
<!--        <a href="../accommodations.php">Accomodations</a>-->
<!--        <a href="#">Contact</a>-->
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

<div style="text-align: center">
<?php

require_once "functions.php";

$roomDetails = getRoomDetails($_POST['room'], $conn);
$catDetail = getCategorieDetails($roomDetails['categorie_id'] ,$conn);
?>
    <div class="text-fixer">
        <h1 class="ml9" >
  <span class="text-wrapper" >
    <span class="letters"><?=$catDetail['naam']?></span>
  </span>
        </h1>
    </div>

    <script>
        // Wrap every letter in a span
        var textWrapper = document.querySelector('.ml9 .letters');
        textWrapper.innerHTML = textWrapper.textContent.replace(/\S/g, "<span class='letter'>$&</span>");

        anime.timeline({loop: true})
            .add({
                targets: '.ml9 .letter',
                scale: [0, 1],
                duration: 1500,
                elasticity: 600,
                delay: (el, i) => 45 * (i+1)
            }).add({
            targets: '.ml9',
            opacity: 0,
            duration: 1000,
            easing: "easeOutExpo",
            delay: 1000
        });
    </script>
    <br>

<?php
$stmt = $conn->prepare('SELECT * FROM seasons');
$stmt->execute();

while($seasonRow = $stmt->fetch(PDO::FETCH_ASSOC)){
    if(checkSeasonDate($seasonRow['startDate'], $seasonRow['endDate'], $_POST['start_date'])){
        echo 'It is   ' .$seasonRow['naam'] . ' now so we calculate the fee with ' . $seasonRow['pricePercentage'] . '%';
        echo '<br>The price in the ' . $seasonRow['naam'] . ' is $ '  .($catDetail['price'] / 100 ) * $seasonRow['pricePercentage'] . ' an night';
        break;
    }
}

?>
<div>
<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../PHPMailer/src/Exception.php';
require '../PHPMailer/src/PHPMailer.php';
require '../PHPMailer/src/SMTP.php';

if(isset($_POST['emailto']) && isset($_POST['emailtoname'])&& isset($_POST['start_date'])&& isset($_POST['end_date'])){//je checkt hier of ze bestaan, niet of bijvoorbeeld het email klopt en de datums bestaan en de datums achtereenvolgend zijn
    //check datum, seizoen en gegevens etc... Zoek controle functies op in google
    //kamer beschikbaar???
    /* Create a new PHPMailer object. Passing TRUE to the constructor enables exceptions. */
    $mail = new PHPMailer(TRUE);

    /* Open the try/catch block. */
    try {
        /*SMTP instellingen */
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = '@gmail.com';
        $mail->Password = '';
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587 ;

        /* Set the mail sender. */
        $mail->setFrom('lennartderidder@gmail.com', 'Administration Hotel California');

        /* Add a recipient. */
        $mail->addAddress($_POST['emailto'], $_POST['emailtoname']);

        /* Set the subject. */
        $mail->Subject = 'Hotel confirmation email';

        /* Set the mail message body. */
        $mail->Body = 'Dear customer, You have made an reservation for:' . $_POST['start_date'] . ' till ' . $_POST['end_date']
            . ' Under the name:' . $_POST['emailtoname'] . ' ' . $_POST['lastname']
            . ' Your home adress:' .$_POST['adress']
            . ' Your city: ' . $_POST['city']
            . ' Your country:' . $_POST['country']
            . ' The categorie you have chosen from is: ' .$catDetail['naam'];

        /* Finally send the mail. */
        $mail->send();
//data will be placed in the database :D
        $data = [
            'firstname' =>$_POST['emailtoname'],
            'lastname' =>$_POST['lastname'],
            'email' =>$_POST['emailto'],
            'roomcategorie' =>$catDetail['naam'],
            'roomnumber'=>$roomDetails['categorie_id'],
            'phone'=> $_POST['tel'],
            'city'=> $_POST['city'],
            'homeadress'=>$_POST['adress'],
            'country'=>$_POST['country'],
            'startdate'=>$_POST['start_date'],
            'enddate'=>$_POST['end_date']
        ];

//        $stmt = $conn->prepare('SELECT * FROM categorie where id = :cat_id')
        $sql = 'INSERT INTO guests (firstname, lastname, email,roomnumber , roomcategorie, phone, homeadress, city, country,startdate,enddate) 
                VALUES (:firstname, :lastname, :email,:roomnumber, :roomcategorie,:phone, :homeadress, :city, :country, :startdate, :enddate)' ;
        $stmt = $conn->prepare($sql);
        $stmt->execute($data);
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


    <form method="post">
        <label>Start date:  <?= htmlspecialchars($_POST['start_date']);  ?></label><br />
         <label>End date:  <?= htmlspecialchars($_POST['end_date']);  ?></label><br />
        <input type="hidden" id="sdatum" value=" <?= htmlspecialchars($_POST['start_date']);  ?>" name="start_date" /><br />

        <input type="hidden" id="edatum" value="<?= htmlspecialchars($_POST['end_date']); ///todo: juiste datum format ?>" name="end_date"/>


        <input type="hidden" value="<?= htmlspecialchars($_POST['room']); ///todo: juiste datum format ?>" name="room"/>


        <label for="emailto">Enter your email</label><br />
        <input type="email" id="emailto" name="emailto" placeholder="example@demo.nl" /><br /><br />

        <label for="emailtoname">Enter your first name</label><br />
        <input type="text" id="emailtoname" name="emailtoname" placeholder="Piet " /><br /><br />

        <label for="lastname">Enter your last name</label><br />
        <input type="text" id="lastname" name="lastname" placeholder="Janssen" /><br /><br />

        <label for="tel">Enter your phone number</label><br />
        <input type="number" id="tel" name="tel" placeholder="Phone number" /><br /><br />

        <label for="adress">Enter your home adress</label><br />
        <input type="text" id="adress" name="adress" placeholder="Adress" /><br /><br />

        <label for="city">Enter your City</label><br />
        <input type="text" id="city" name="city" placeholder="City" /><br /><br />

        <label for="country">Enter your Country</label><br />

        <select name="country" id="country">
            <option value="Germany">Germany</option>
            <option value="Belgium">Belgium</option>
            <option value="America">America</option>
            <option value="Canada">Canada</option>
            <option value="Netherlands">Netherlands</option>
            <option value="France">France</option>
            <option value="Nepal">Nepal</option>
            <option value="Russia">Russia</option>
            <option value="United Emirates">United Emirates</option>

        </select>

        <input  type="submit"  value="Verstuur bevestiging"/>
    </form>

    <br>
    <?php
}
?>
</div>
    <footer style="margin-bottom: 20px">
        <div class="blackme">
            <div style="margin-left: 30px">
                <li> Contact </li>
                <li> Phone: +31 6 12 34 56 78</li>
                <li> Mail: info.hotelcalifornia@gmail.com</li>
                <li> Location: Amerika</li>
            </div>
</html>