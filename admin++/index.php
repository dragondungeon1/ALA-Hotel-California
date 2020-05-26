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
<!--<div class="flex">-->
<!--    <div class="card">-->
<!--        <img class="one_img" src="../img/kamer1.jpg" alt="room 1" style="width:100%">-->
<!--        <h1>Family XL</h1>-->
<!--        <p class="price">$150 the night</p>-->
<!--        <p>This is a 2 bed bedroom with a shower, TV, free wifi and a balcony .</p>-->

        <?php

        require_once "functions.php";

        $catQuery = "SELECT * FROM categorie";
        $catResults = $conn ->query($catQuery);


        foreach ($catResults as $catResult){
            echo ' <a  href="viewcat.php?id=" <button class="button-primary buiten">' . $catResult['id'] . $catResult['naam'] .   "</a></b><br></button> ";
//    SELECT * FROM product where categorie_id = $catResult['id'];
            $stmt = $conn->prepare('SELECT * FROM product where categorie_id = :cat_id');
            $stmt->bindParam('cat_id', $catResult['id'], PDO::PARAM_INT);
            $stmt->execute();

            while ($prodRow = $stmt->fetch(PDO::FETCH_ASSOC)){
                echo $prodRow['naam'] . "<br>";
            }



        }
        ?>
<!--    </div>-->
</body>
</html>
