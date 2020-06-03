<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/stylesheet.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300&display=swap" rel="stylesheet">

    <title>Document</title>
</head>
<body>
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



<div>
    <blockquote class="center">
        <h2>Our activities for young and old</h2>
    </blockquote>
</div>

<div>
    <h2>You can take a swim in one of our pools</h2>
</div>



</body>
</html>

<script>
    function openNav() {
        document.getElementById("myNav").style.height = "100%";
    }

    function closeNav() {
        document.getElementById("myNav").style.height = "0%";
    }
</script>

