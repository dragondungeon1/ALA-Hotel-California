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
<!--navbar-->
<body class="bg">
<div>
    <nav class="menu">
        <ul class="menu__list">
            <img class="img-test" src="img/grey2.jpg" alt="logo">
            <li class="menu__group"><a href="#" class="menu__link">Hotel California</a></li>
            <li class="menu__group"><a href="index.php" class="menu__link">Home</a></li>
            <li class="menu__group"><a href="rooms.php" class="menu__link">Rooms </a></li>
            <li class="menu__group"><a href="accommodations.php" class="menu__link">Accommodations</a></li>
            <li class="menu__group"><a href="#" class="menu__link">Locations</a></li>
        </ul>
    </nav>
</div>
<div class="text2">
    <h2>Welcome to Hotel California</h2>
</div>
<br>
<div>
<!--slideshow-->
    <div class="slideshow-container">

        <div class="mySlides fade">
            <div class="numbertext">1 / 6</div>
            <img class="kamer" src="img/kamer1.jpg" style="width:100%">
            <div class="text">Room 1</div>
        </div>

        <div class="mySlides fade">
            <div class="numbertext">2 / 6</div>
            <img class="kamer" src="img/kamer2.jpg" style="width:100%">
            <div class="text">Room 2</div>
        </div>

        <div class="mySlides fade">
            <div class="numbertext">3 / 6</div>
            <img class="kamer" src="img/kamer3.jpg" style="width:100%">
            <div class="text">Room 3</div>
        </div>

        <div class="mySlides fade">
            <div class="numbertext">4 / 6</div>
            <img class="kamer" src="img/pool1.jpg" style="width:100%">
            <div class="text">Pool 1</div>
        </div>

        <div class="mySlides fade">
            <div class="numbertext">5 / 6</div>
            <img class="kamer" src="img/pool2.jpeg" style="width:100%">
            <div class="text">Pool 2</div>
        </div>

        <div class="mySlides fade">
            <div class="numbertext">6 / 6</div>
            <img class="kamer" src="img/playground.jpeg" style="width:100%">
            <div class="text">Playground for kids</div>
        </div>
        <a class="prev"  onclick="plusSlides(-1)">&#10094;</a> <a class="next" onclick="plusSlides(1)">&#10095;</a> </div>
    </div>
    <div class="center" >
        <button class="button-warning"><a href="rooms.php">Book now a room</a></button>
    </div>
    <br>
<!--dots under slideshow-->
    <div style="text-align:center">
        <span class="dot" onclick="currentSlide(1)"></span>
        <span class="dot" onclick="currentSlide(2)"></span>
        <span class="dot" onclick="currentSlide(3)"></span>
        <span class="dot" onclick="currentSlide(4)"></span>
        <span class="dot" onclick="currentSlide(5)"></span>
        <span class="dot" onclick="currentSlide(6)"></span>
    </div>


    <script>
        var slideIndex = 0;
        showSlides();
        var slides,dots;

        function showSlides() {
            var i;
            slides = document.getElementsByClassName("mySlides");
            dots = document.getElementsByClassName("dot");
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }
            slideIndex++;
            if (slideIndex> slides.length) {slideIndex = 1}
            for (i = 0; i < dots.length; i++) {
                dots[i].className = dots[i].className.replace(" active", "");
            }
            slides[slideIndex-1].style.display = "block";
            dots[slideIndex-1].className += " active";
            setTimeout(showSlides, 8000); // Change image every 8 seconds
        }

        function plusSlides(position) {
            slideIndex +=position;
            if (slideIndex> slides.length) {slideIndex = 1}
            else if(slideIndex<1){slideIndex = slides.length}
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }
            for (i = 0; i < dots.length; i++) {
                dots[i].className = dots[i].className.replace(" active", "");
            }
            slides[slideIndex-1].style.display = "block";
            dots[slideIndex-1].className += " active";
        }

        function currentSlide(index) {
            if (index> slides.length) {index = 1}
            else if(index<1){index = slides.length}
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }
            for (i = 0; i < dots.length; i++) {
                dots[i].className = dots[i].className.replace(" active", "");
            }
            slides[index-1].style.display = "block";
            dots[index-1].className += " active";
        }
    </script>

<br>
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
