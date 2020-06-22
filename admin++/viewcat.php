<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/stylesheet.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300&display=swap" rel="stylesheet">
    <title>viewcat</title>
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
</html>


<div style="text-align: center">

<?php
require_once "functions.php";


if (isset($_GET['id'])){
    getCategorie($_GET['id'], $conn);
    $catDetails = getCategorieDetails($_GET['id'], $conn);
echo '<br> <br> <br>';
}
function getCategorie($catid, $conn){
    $stmt = $conn->prepare('SELECT * FROM product where categorie_id = :cat_id');
    $stmt->bindParam(':cat_id', $catid, PDO::PARAM_INT);
    $stmt->execute();
    $catDetails = getCategorieDetails($catid, $conn);
    $roomDetails = getRoomDetails($catid, $conn);
    while ($prodRow = $stmt->fetch(PDO::FETCH_ASSOC)){
        echo "<b> " .  $catDetails['naam'] . "<br></b>"
            . $roomDetails['categorie_id'] . "<br>"
            . $catDetails['beschrijving'] . "<br>$"
            . $catDetails['price'] . "<br>"
            . $catDetails['naam']  ;
        ?>
        <div>
            <form id="<?=$prodRow['room_number'];?>" method="post" action="book.php">
                <label for="start_date">Select a start date:</label>
                <input type="date" id="start_date" name="start_date"> <br>
                <label for="end_date">Select an end date:</label>
                <input type="date" id="end_date" name="end_date">
                <input type="hidden" name="room" value="<?=$prodRow['room_number'];?>"> <br>
                <input  class="button-warning" type="submit" value="Book now">
            </form>
        </div>



        <?php

    }
}
?>
</div>
<!--<div class="viewcat">-->
<!--    <img src='/Hotel/--><?php //echo $catDetails["img"] ?><!--' />-->
<!--</div>-->
<div class="slideshow-container">

    <div class="mySlides fade">
        <div class="numbertext">1 / 6</div>
        <img class="kamer" src="/Hotel/<?php echo $catDetails["img"] ?>" style="width:100%">
        <div class="text">Bedroom</div>
    </div>

    <div class="mySlides fade">
        <div class="numbertext">2 / 6</div>
        <img class="kamer" src="../img/bathroom.jpg" style="width:100%">
        <div class="text">bathroom</div>
    </div>

    <div class="mySlides fade">
        <div class="numbertext">2 / 6</div>
        <img class="kamer" src="../img/seasight2.jpg" style="width:100%">
        <div class="text">Seasight from your balcony</div>
    </div>
    <a class="prev"  onclick="plusSlides(-1)">&#10094;</a> <a class="next" onclick="plusSlides(1)">&#10095;</a> </div>

</div>
<div style="text-align:center">
    <span class="dot" onclick="currentSlide(1)"></span>
    <span class="dot" onclick="currentSlide(2)"></span>
    <span class="dot" onclick="currentSlide(3)"></span>

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