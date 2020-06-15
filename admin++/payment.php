<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/stylesheet.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300&display=swap" rel="stylesheet">
    <title>Document</title>
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

    function printDiv(divName) {
        var printContents = document.getElementById(divName).innerHTML;
        var originalContents = document.body.innerHTML;

        document.body.innerHTML = printContents;

        window.print();

        document.body.innerHTML = originalContents;
    }
</script>

<?php require_once "functions.php" ;
    require_once 'DB.php'

?>
<br>
<br>
<br>
<div class="" style="text-align: center">
    <b>The room you choose:</b> <br>
    <b>The price you will have to pay:</b> <br>
    <b>The date you selected:</b> <br>
    <div class="card">
        <h3>Please fill in your creditials</h3>
        <form method="post" action="thankyou.php" >
            <label for="test">test</label> <br>
            <input type="text" id="voornaam" name="firstname" placeholder="firs tname"> <br>
            <input type="text" id="achternaam" name="lastname" placeholder="last name"> <br>
            <input type="text" id="mail" name="mail" placeholder="e-mail"> <br>
            <input type="text" id="voornaam" name="firstname" placeholder="adress"> <br>
            <input type="text" id="voornaam" name="firstname" placeholder="postalcode"> <br>
            <input class="button-primary" type="submit" value="test">
        </form>
    </div>
</div>


</body>
</html>

<?php

