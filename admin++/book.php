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
        echo 'Het is nu ' .$seasonRow['naam'] . ' dan rekenen wij met een percentage van ' . $seasonRow['pricePercentage'] . '%';
        echo '<br>De prijs p.p.p.n is in de ' . $seasonRow['naam'] . '$' .($catDetail['price'] / 100 ) * $seasonRow['pricePercentage'];
        break;
    }
}
