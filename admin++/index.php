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


<div class="center">
    <h2>our selection of rooms</h2>
</div>
<div class="flex">
<?php
require_once 'functions.php';

$catQuery = "SELECT * FROM categorie ";
$catResults = $conn ->query($catQuery);

 foreach ($catResults as $catResult){
     $stmt = $conn->prepare('SELECT * FROM product where categorie_id = :cat_id');
     $stmt->bindParam('cat_id', $catResult['id'], PDO::PARAM_INT);
     $stmt->execute();

     ?>
     <div class="flex101">
         <div class="card101" style="border-radius: 30px; background-color: black; color: white; opacity: 85%">
             <img class='foto-card flex' src='/Hotel/<?php echo $catResult["img"] ?>' />
             <?php echo '<h2 style="font-family: \'Montserrat\', sans-serif">'. $catResult['naam'] . '</h2>'  ; ?>
             <?php echo '<h4 style="font-family: \'Montserrat\', sans-serif">' . $catResult['beschrijving'] . '</h4>' ; ?>
             <?php echo '<h3 style="font-family: \'Montserrat\', sans-serif" >' . $catResult['price'] .  '$ A / night</h3>'; ?>
             <p>*Prices vary per season</p>
             <a href="viewcat.php?id=<?php echo  $catResult['id'] ?>">  <button class="button-danger" > book now </button></a>
         </div>
     </div>
    <?php
 }
?>
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































