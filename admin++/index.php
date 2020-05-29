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

<div>
    <nav class="menu">
        <ul class="menu__list">
            <img class="img-test" src="../img/grey2.jpg" alt="logo">
            <li class="menu__group"><a href="#" class="menu__link">Hotel California</a></li>
            <li class="menu__group"><a href="../index.php" class="menu__link">Home</a></li>
            <li class="menu__group"><a href="../rooms.php" class="menu__link">Rooms </a></li>
            <li class="menu__group"><a href="../accommodations.php" class="menu__link">Accommodations</a></li>
            <li class="menu__group"><a href="#" class="menu__link">Locations</a></li>
        </ul>
    </nav>
</div>


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
         <div class="card101">
             <img class='foto-card flex' src='/Hotel/<?php echo $catResult["img"] ?>' />
             <?php echo $catResult['naam'] . '<br> <br>' ; ?>
             <?php echo $catResult['beschrijving'] . '<br>'; ?>
             <a  href="viewcat.php?id=" <button class="button-primary" > <?php echo  $catResult['naam'] ?>  </a></b><br></button>
         </div>
     </div>
    <?php
 }
?>

</body>
</html>

































