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


if (isset($_GET['id'])){
    getCategorie($_GET['id'], $conn);
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
            . "<img  style='text-align:center;' src='/hotel/' "  . $catDetails['img'] . '<br>'
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

<img class='foto-card flex' src='/Hotel/<?php echo $catResult["img"] ?>' />