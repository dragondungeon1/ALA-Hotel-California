<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/stylesheet.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300&display=swap" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/2.0.2/anime.min.js"></script>
    <title>Hotel Cali</title>
</head>
<!--navbar-->
<body class="bg">
<span style="font-size:30px;cursor:pointer; text-align: center" onclick="openNav()">&#9776; Navigation</span>
<div id="myNav" class="overlay">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    <div class="overlay-content">
        <img style="width: 100px; height: 100px" src="img/logo2.jpg" alt="">
        <a href="index.php">Home</a>
        <a href="admin++/index.php">Rooms</a>
<!--        <a href="accommodations.php">Accomodations</a>-->
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
<br>
<div class="text-fixer">
    <h1 class="ml9" >
  <span class="text-wrapper" >
    <span class="letters">Hotel California</span>
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
<!--<div class="text2" style="opacity: %">-->
<!--    <h2>Welcome to Hotel California</h2>-->
<!--</div>-->
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
        <button class="button-warning"><a href="admin++/index.php">Book now a room</a></button>
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

<!--top left-->
<div class="TB" style="border-radius: 40px; margin-right: 30px; margin-left:30px; opacity: 90%; width: 900px">
    <blockquote>
        <h2>Are you looking for ultimate relaxation?</h2>
        <h3>Well than you are on the right adress! Hotel California is one <br>
            of the biggest and best hotels you can get. We have a <br>
            nice pool for when it is hot outside, and for in the evening <br>
            we have a smoking hot sauna that you can use. And if that isn't <br>
            enough you can always order room service when you are hungry or <br>
            hungover of course </h3>

    </blockquote>
</div>

<div class="TB right"  style="border-radius: 40px; width: 900px"   >
    <blockquote>
        <h2>Special vacations for everyone!</h2>
        <h3>No one is too old to make some fun or to relax, try our new sauna. <br>
            Or for instance try out our new waterslide with a length of 20M! <br>
            For the really young kids we have an kid amusement team that takes <br>
            the children on a nice trip through the hotel with some activities <br>
            If you are interested we offer an jet-ski trip of 2,5 hours around <br>
            the west coast where we later take some pictures of course <br> <br>
        </h3>
    </blockquote>
</div>


</div>
<footer style="margin-bottom: 20px">
<div class="blackme">
    <div style="margin-left: 30px">
        <li> Contact </li>
        <li> Phone: +31 6 12 34 56 78</li>
        <li> Mail: info.hotelcalifornia@gmail.com</li>
        <li> Location: Amerika</li>
    </div>

</div>

</footer>
</body>
</html>



<?php
