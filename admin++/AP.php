<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="../css/stylesheet.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300&display=swap" rel="stylesheet">
    <span style="font-size:30px;cursor:pointer; text-align: center" onclick="openNav()">&#9776; Navigation</span>
    <div id="myNav" class="overlay">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <div class="overlay-content">
            <img style="width: 100px; height: 100px" src="img/logo2.jpg" alt="">
            <a href="index.php">Home</a>
            <a href="admin++/index.php">Rooms</a>
            <a href="accommodations.php">Accomodations</a>
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

    <div class="center">
        <h2>Welcome to the Admin Panel. </h2>
    </div>

    <div class="center">
       <p>Choose your option:</p>
    </div>

    <br> <br>

    <div class="flex">
        <div class="card" style="border-radius: 10px; background-color: ;">
            <h1>Book a room</h1>
            <p class="price">Book a room here</p>
            <p><button class="button-warning" style="width: 95%;">Book room</button></p>
        </div>

        <div class="card" style="border-radius: 10px; background-color: ">
            <h1>Room plan</h1>
            <p class="price">Locations of the rooms</p>
            <p><button class="button-danger" style="width: 95%;">Map</button></p>
        </div>

        <div class="card" style="border-radius: 10px; background-color: ">
            <h1>Book a room</h1>
            <p class="price">Book a room here</p>
            <p><button class="button-succes" style="width: 95%;">Book room</button></p>
        </div>

        <div class="card" style="border-radius: 10px; background-color: ">
            <h1>Book a room</h1>
            <p class="price">Book a room here</p>
            <p><button class="button-primary" style="width: 95%;">Book room</button></p>
        </div>
    </div>
</head>
<body>

</body>
</html>

<?php
