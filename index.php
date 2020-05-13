<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/stylesheet.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300&display=swap" rel="stylesheet">

    <title>Hotel Cali</title>
</head>
<body class="bg">
<div>
    <nav class="menu">
        <ul class="menu__list">
            <li class="menu__group"><a href="#" class="menu__link">Hotel California</a></li>
            <li class="menu__group"><a href="index.php" class="menu__link">Home</a></li>
            <li class="menu__group"><a href="rooms.php" class="menu__link">Rooms </a></li>
            <li class="menu__group"><a href="calendar.php" class="menu__link">Reservations</a></li>
            <li class="menu__group"><a href="#" class="menu__link">Locations</a></li>
        </ul>
    </nav>
</div>
<div class="text2">
    <h2>Welcome to Hotel California</h2>
</div>
<br>
<div>

    <div class="slideshow-container">

        <div class="mySlides fade">
            <div class="numbertext">1 / 5</div>
            <img class="kamer" src="img/kamer1.jpg" style="width:100%">
            <div class="text">Room 1</div>
        </div>

        <div class="mySlides fade">
            <div class="numbertext">2 / 5</div>
            <img class="kamer" src="img/kamer2.jpg" style="width:100%">
            <div class="text">Room 2</div>
        </div>

        <div class="mySlides fade">
            <div class="numbertext">3 / 5 </div>
            <img class="kamer" src="img/kamer3.jpg" style="width:100%">
            <div class="text">Room 3</div>
        </div>

        <div class="mySlides fade">
            <div class="numbertext">4 / 5</div>
            <img class="kamer" src="img/pool1.jpg" style="width:100%">
            <div class="text">Pool 1</div>
        </div>

        <div class="mySlides fade">
            <div class="numbertext">5 / 5</div>
            <img class="kamer" src="img/pool2.jpeg" style="width:100%">
            <div class="text">Pool 2</div>
        </div>

    </div>
    <div class="center">
        <button class="button-warning"><a href="rooms.php">Book now a room</a></button>
    </div>
    <br>

    <div style="text-align:center">
        <span class="dot" onclick="currentSlide(1)"></span>
        <span class="dot" onclick="currentSlide(2)"></span>
        <span class="dot" onclick="currentSlide(3)"></span>
        <span class="dot" onclick="currentSlide(4)"></span>
        <span class="dot" onclick="currentSlide(5)"></span>
    </div>

    <script>
        var slideIndex = 0;
        showSlides();

        function showSlides() {
            var i;
            var slides = document.getElementsByClassName("mySlides");
            var dots = document.getElementsByClassName("dot");
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }
            slideIndex++;
            if (slideIndex > slides.length) {slideIndex = 1}
            for (i = 0; i < dots.length; i++) {
                dots[i].className = dots[i].className.replace(" active", "");
            }
            slides[slideIndex-1].style.display = "block";
            dots[slideIndex-1].className += " active";
            setTimeout(showSlides, 5000); // Change image every 5 seconds
        }
    </script>
<div class="TB">
    <blockquote style="padding: 1px">
        <h2>Are you looking for ultimate relaxation?</h2>
        <h3>Well than you are on the right adress! Hotel California is one <br>
            of the biggest and best hotels you can get. We have a <br>
            nice pool for when it is hot outside, and for in the evening <br>
            we have a smoking hot sauna that you can use. And if that isn't <br>
            enough you can always order room service when you are hungry or <br>
            hungover of course </h3>
    </blockquote>

</div>
</div>
</body>
</html>



<?php
